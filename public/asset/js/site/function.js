let page_scoller = document.getElementById('html');
// slowScroll(0.1, page_scoller);

function slowScroll(ratio, scroller) {
    scroller.addEventListener("wheel", (event) => {
        //   event.preventDefault();
        let target = scroller.scrollTop + event.deltaY * ratio;
        scroller.scrollTo({
            top: target,
            behavior: "smooth"
        })
    }, {passive: false});   
}

function autoScrollToNext(scroller) {
    scroller.addEventListener("wheel", (event) => {
        if (document.documentElement.scrollTop < scroller.scrollTop  && scroller.offsetHeight + scroller.scrollTop >= scroller.scrollHeight) {
            console.log("sssss");
            mainParent = scroller.closest('.eachSec');
            nextSibling = mainParent.nextElementSibling;
            nextSibling.scrollIntoView({behavior: 'smooth'});  
        }
    })
}