jQuery(function () {
    swal.close();
    $('body').css('opacity', 1);

    $(document).on("change", ".selectChange", function () {
        var value = $(this).val();
        var id = $(this).attr('data-id');

        if (id > 0 && value > 0) {
            $('.loadingPopup').css('bottom', '20%');
            fetch(adminAddress + "/api/save/admin/", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ id: id, value: value }),
            }).then((response) => response.json()).then((jsonData) => {
                location.reload();
            });
        }
    })

    $(document).on("change", ".selectChangeAll", function () {
        var value = $(this).val();
        var checked = [];
        $("input[name='selectUser[]']:checked").each(function(){
            checked.push(this.value);
        });

        if (checked.length > 0 && value > 0) {
            $('.loadingPopup').css('bottom', '20%');
            fetch(adminAddress + "/api/saveAll/admin/", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ checked: checked, value: value }),
            }).then((response) => response.json()).then((jsonData) => {
                location.reload();
            });
        }
    })

    $(document).on('click', '.headerFilter', function () {
        $('.searchPopup').css('bottom', '20%');
    })

    $(document).on('click', '.queryLog', function () {
        $('.queryAllPage').toggle();
    })

    $(document).on('click', '.reportShow', function () {
        var reportId = $(this).attr('data-id');

        if (reportId) {
            fetch(adminAddress + "/api/show/report/", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ report: reportId}),
            }).then((response) => response.json()).then((jsonData) => {
                $('.reportTextPopup .reportData').text(jsonData.text);
                $('.reportTextPopup').css('bottom', '20%');
            });
        }
    })

    $(document).on('click', '.returnToPrev', function () {
        var report = $(this).attr('data-id');
        var user = $(this).attr('data-user');

        if (report > 0 && user > 0) {
            $('.loadingPopup').css('bottom', '20%');
            $('.main').css('opacity', .3);
            $('.main').click(false);
            $('.reportPopup').css('bottom', '-100%');
            fetch(adminAddress + "/report/returnToPrev/", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ report: report, user: user}),
            }).then((response) => response.json()).then((jsonData) => {
                $('.loadingPopup').css('bottom', '-100%');
                $('.main').css('opacity', .1);
                location.reload();
            });
        }
    })

    $(document).on('click', '.submitReport', function () {
        var text = $(this).closest('.reportPopup').find('.descriptionReport').val();
        var id = $(this).attr('data-id');
        var currentAdmin = $(this).attr('data-current');

        if (currentAdmin > 0 && id > 0 && text != "") {
            $('.loadingPopup').css('bottom', '20%');
            $('.main').css('opacity', .3);
            $('.main').click(false);
            $('.reportPopup').css('bottom', '-100%');
            fetch(adminAddress + "/api/save/report/", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ userId: id, currentAdmin: currentAdmin, text:text}),
            }).then((response) => response.json()).then((jsonData) => {
                $('.loadingPopup').css('bottom', '-100%');
                $('.main').css('opacity', .1);
                Swal.fire({
                    allowOutsideClick: false,
                    icon : 'info',
                    title: '<strong>توجه</strong>',
                    html: jsonData.message,
                    confirmButtonText: 'حله زیبا'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            });
        }        
    })

    $(document).on('click', '.report', function () {
        var id = $(this).attr('data-id');
        $('.submitReport').attr('data-id', id);
        $('.reportPopup').css('bottom', '20%');
    })

    $(document).on('click', '.selectAll', function () {
        $('.checkboxInput').prop('checked', true);
    })

    $(document).on('click', '.unselectAll', function () {
        $('.checkboxInput').prop('checked', false);
    })

    $(document).on('click', '.extractJs', function () {
        $('.loadingPopup').css('bottom', '20%');
        $('.main').css('opacity', .3);
        $('.main').click(false);
        var dataId = $(this).attr('data-id');
        if (dataId > 0) {
            fetch(adminAddress + "/file/extract/", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ id: dataId}),
            }).then((response) => response.json()).then((jsonData) => {
                if (! jsonData.error) {
                    location.reload();
                } else {
                    $('.loadingPopup').css('bottom', '-100%');
                    $('.main').css('opacity', .1);
                    Swal.fire({
                        allowOutsideClick: false,
                        icon : 'error',
                        title: '<strong>خطا</strong>',
                        html: jsonData.message,
                        confirmButtonText: 'حله زیبا'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }
            });
        }
    })

    $(document).on('click', '.popupClose', function () {
        $('.normalPopup').css('bottom', '-100%');
    });

    $(document).on('click', '.transferShow', function () {
        var id = $(this).attr('data-id');
        var admin = $(this).attr('data-admin');
        var name = $(this).attr('data-name');
        $('.transferPopup .userHidden').val(id);
        $('.setFrom').val(admin);
        $('.popupHeader h3').text('انتقال ' + name);
        $('.transferPopup').css('bottom', '20%');
    });

    $(document).on("change", ".manageFile input", function () {
        var fileName = $(this).val();
        if (fileName == "") {
            fileName = "انتخاب فایل..."
        }
        $(this).parent().find('span').html(fileName);
    });

    $(document).on("click", ".columnsAction .addAction", function () {
        var allColumns = $(this).closest('.allColumns');
        var elmCopy = $(this).closest('.eachColumn').clone();
        elmCopy.find('.columnsKey').val("0");
        elmCopy.find('.columnsValue').val("");
        $(allColumns).append(elmCopy);
    });

    $(document).on("click", ".columnsAction .minusAction", function () {
        var allColumns = $(this).closest('.allColumns');
        var length = allColumns.children().length;
        if (length > 1) {
            var each = $(this).closest('.eachColumn');
            if (! each.hasClass('spec')) {
                each.remove();
            }
        }
    });

    $(document).on('click', '.moreInfo', function () {
        $(this).closest('.eachRow').next('.supportingRow').show();
        $(this).text('کمتر');
        $(this).addClass('lessInfo');
        $(this).removeClass('moreInfo');
    })

    $(document).on('click', '.lessInfo', function () {
        $(this).closest('.eachRow').next('.supportingRow').hide();
        $(this).text('بیشتر');
        $(this).addClass('moreInfo');
        $(this).removeClass('lessInfo');
    })

})
