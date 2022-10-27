let srcbar = document.getElementById('srcbar');
const under = document.querySelector('.under');
const nav = document.getElementById('nav');


nav.addEventListener('mouseover',() => {
    under.classList.add('nav-menu');
});

nav.addEventListener('mouseleave',() => {
    under.classList.remove('nav-menu');
});

document.addEventListener("click", (e) => {
    let clickedElem = e.target;
    do {
        if (clickedElem == srcbar) {
            document.body.style.background = "url('wallpaperflareblur.jpg')";
            under.classList.add('nav-menu');
            return;
        } 
        clickedElem = clickedElem.parentNode;
    } while (clickedElem);
    document.body.style.background = "url('wallpaperflare.jpg')";
});