/*================variables declartion===================*/

let srcbar = document.getElementById('srcbar');
const nav = document.querySelector('nav');
const under = document.getElementById('undercontainer');
let navlinks = document.querySelectorAll('.nav-link');
let navitems = document.querySelectorAll('.nav-item');
const sep = document.getElementById('separator');


/*===================underline when hover==============================
* add span when hover
*/

for (const navitem of navitems) {
    let span = document.createElement('span');
    navitem.appendChild(span);
    navitem.addEventListener('mouseover', () => {
        span.classList.add('hover');
    });

    navitem.addEventListener('mouseleave', () => {
        span.classList.remove('hover')
    });
};


/* under menu below category
for (const navitem of navitems) {
    let menu = document.querySelector('.menu-nav');
    navitem.addEventListener('mouseover', () => {
        menu.classList.add('hover-menu');
    });
    navitem.addEventListener('mouseleave', () => {
        menu.classList.remove('hover-menu')
    });
};*/

/*============= separator ligne between over container and under================*/
nav.addEventListener('mouseover', () => {
    sep.style.display = 'block';
});
nav.addEventListener('mouseleave', () => {
    sep.style.display = 'none';
});

/*====================Event when click on the search bar====================*/
document.addEventListener("click", (e) => {
    let clickedElem = e.target;
    do {
        if (clickedElem == srcbar) {
            document.body.style.background = "url('wallpaperflareblur.jpg')";
            nav.classList.add('nav2');
            nav.classList.remove('nav');
            under.classList.add('under-container2');
            for (const navlink of navlinks) {
                navlink.classList.add('nav-link2');
            }
            return;
        }
        clickedElem = clickedElem.parentNode;
    } while (clickedElem);
    document.body.style.background = "url('wallpaperflare.jpg')";
    nav.classList.remove('nav2');
    nav.classList.add('nav');
    under.classList.remove('under-container2');
    for (const navlink of navlinks) {
        navlink.classList.remove('nav-link2')
    }
});


/* separator when the src bar is focused
TODO: not completed
*/ 
srcbar.addEventListener('focus', () => {
    sep.style.display = 'block';
});
srcbar.addEventListener('blur', () => {

});

