// Add your custom JS here.

const getScrollbarWidth = () => window.innerWidth - document.documentElement.clientWidth;
console.log(getScrollbarWidth());

var menutoggle = document.getElementById('menutoggle');
var myOffcanvas = document.getElementById('rightOffcanvas');
myOffcanvas.addEventListener('show.bs.offcanvas', function () {
    console.log('show');
    menutoggle.classList.add('pe-4');
});
myOffcanvas.addEventListener('hidden.bs.offcanvas', function () {
    console.log('hidden');
    menutoggle.classList.remove('pe-4');
});

/* hide header on scroll */

var doc = document.documentElement;
var w = window;

var prevScroll = w.scrollY || doc.scrollTop;
var curScroll;
var direction = 0;
var prevDirection = 0;

var header = document.getElementById('wrapper-navbar');

var checkScroll = function() {

    /*
    ** Find the direction of scroll
    ** 0 - initial, 1 - up, 2 - down
    */

    curScroll = w.scrollY || doc.scrollTop;
    if (curScroll > prevScroll) { 
    //scrolled up
    direction = 2;
    }
    else if (curScroll < prevScroll) { 
    //scrolled down
    direction = 1;
    }

    if (direction !== prevDirection) {
    toggleHeader(direction, curScroll);
    }

    prevScroll = curScroll;
};

var toggleHeader = function(direction, curScroll) {
    if (direction === 2 && curScroll > 52) { 

    //replace 52 with the height of your header in px
    if (!document.getElementById('navbar').classList.contains("show")) {
        header.classList.add('hide');
        prevDirection = direction;
    }
    }
    else if (direction === 1) {
    header.classList.remove('hide');
    prevDirection = direction;
    }
};

window.addEventListener('scroll', checkScroll);
  

// window.addEventListener("load", function () {
//   AOS.init({
//     duration: 2000,
//     once: true,
//   });
// });


// (function(){


  
// })();
