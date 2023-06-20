$(document).ready(function () {
    $('.single-item').slick({
        nextArrow: '<button class="caroselNext caroselbuttons"><svg style="fill:#BCA370" xmlns="http://www.w3.org/2000/svg" class="svg-icon video-svg" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1"><path d="M512 64C264.8 64 64 264.8 64 512s200.8 448 448 448 448-200.8 448-448S759.2 64 512 64z m0 832c-212 0-384-172-384-384s172-384 384-384 384 172 384 384-172 384-384 384z m158.4-610.4L444 512l226.4 226.4-44.8 45.6-272-272 272-272 44.8 45.6z"/></svg></button>',
        prevArrow: '<button class="caroselPrev caroselbuttons"><svg style="fill:#BCA370" xmlns="http://www.w3.org/2000/svg" class="svg-icon video-svg" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1"><path d="M512 128c212 0 384 172 384 384s-172 384-384 384-384-172-384-384 172-384 384-384m0-64C264.8 64 64 264.8 64 512s200.8 448 448 448 448-200.8 448-448S759.2 64 512 64zM398.4 240l-45.6 45.6L580 512 353.6 738.4l45.6 45.6 272-272-272.8-272z"/></svg></button>'
    });

    const formBtn = document.querySelector("#consultBtn");
    formBtn.addEventListener('click', (evt) => {
        evt.preventDefault();
        $("#formContent")[0].scrollIntoView({behavior: 'smooth'});
    });

    $('.send-req').on('click', function () {
        var name = $('input[name="name"]').val();
        var surname = $('input[name="surname"]').val();
        var field = $('select[name="field"]').val();
        var mobile = $('input[name="mobile"]').val();
        var descripion = $('textarea[name="description"]').val();

        var formData = new FormData();
        formData.append("name", name);
        formData.append("surname", surname);
        formData.append("mobile", mobile);
        formData.append("field", field);
        formData.append("description", descripion);
        $.ajax({
            type: "post",
            url: siteAddress + "api/consult/",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.error) {
                Swal.fire({
                    text: response.message,
                    icon: "error",
                    confirmButtonText: "باشه",
                });
                } else {
                    Swal.fire({
                        text: "درخواست شما ثبت شد. همکاران ما بزودی با شما تماس خواهند گرفت",
                        icon: "success",
                        confirmButtonText: "باشه",
                    }).then((result) => {
                        if (result.isConfirmed)
                            location.reload();
                    });
                }
            }
        });
    });
});