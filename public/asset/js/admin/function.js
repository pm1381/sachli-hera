function showLoading() {
    return'<div class="popupPage"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>'
}

function _(el) {
  return document.getElementById(el);
}

function uploadFile(id) {
  var file = this.files[0];
  var number = this.getAttribute('data-number');
  var main = this.getAttribute('data-main');
  var formdata = new FormData();
  formdata.append("file", file);
  formdata.append("id", id);
  formdata.append("main", main);
  formdata.append("number", number);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler.bind(null, this), false);
  ajax.addEventListener("load", completeHandler.bind(null, this), false);
  ajax.addEventListener("error", errorHandler.bind(null, this), false);
  ajax.open("POST", adminAddress + 'api/image/', true); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  ajax.send((formdata));
//   ajax.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
//   ajax.send(JSON.stringify(formdata));
}

function homeuploadFile(number) {
  var file = this.files[0];
  var name = this.getAttribute('data-name');
  var formdata = new FormData();
  formdata.append("file", file);
  formdata.append("name", name);
  formdata.append("number", number);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler.bind(null, this), false);
  ajax.addEventListener("load", completeHandler.bind(null, this), false);
  ajax.addEventListener("error", errorHandler.bind(null, this), false);
  ajax.open("POST", adminAddress + 'api/homeImage/', true);
  ajax.send((formdata));
}

function progressHandler(el, event) {
    var form = el.closest('#upload_form');
    var status = form.querySelector('#status');
    var progress = form.querySelector('#progressBar');
    var load = form.querySelector('#loaded_n_total');
    load.innerHTML = "نعداد " + event.loaded + " بایت از" + event.total + "بایت آپلود شده است";
    var percent = (event.loaded / event.total) * 100;
    progress.value = Math.round(percent);
    status.innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(el, event) {
    let response = $.parseJSON(event.target.responseText)
    var form = el.closest('#upload_form');
    var status = form.querySelector('#status');
    var progress = form.querySelector('#progressBar');
    if (response.error) {
        status.innerHTML = 'خطا در بارگذاری';
    } else {
        status.innerHTML = 'با موفقیت آپلود شد';
    }
    progress.value = 100; //wil clear progress bar after successful upload
}

function errorHandler(el, event) {
    var form = el.closest('#upload_form');
    var status = form.querySelector('#status');
    status.innerHTML = "خطا در آپلود";
}