let srcbar = document.getElementById('srcbar');

document.addEventListener("click", (e) => {
    let clickedElem = e.target;
    do {
        if (clickedElem == srcbar) {
            document.body.style.background = "url('wallpaperflareblur.jpg')";
            return;
        } 
        clickedElem = clickedElem.parentNode;
    } while (clickedElem);
    document.body.style.background = "url('wallpaperflare.jpg')";
});