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
});