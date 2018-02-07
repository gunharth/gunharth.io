import Highlight from './modules/highlight';

// document.addEventListener('turbolinks:load', () => {
    Highlight.start();
// });

/* begin begin Back to Top button  */
(function () {
    'use strict';

    function trackScroll() {
        var scrolled = window.pageYOffset;
        var coords = document.documentElement.clientHeight;

        if (scrolled > coords) {
            goTopBtn.classList.add('back_to_top-show');
        }
        if (scrolled < coords) {
            goTopBtn.classList.remove('back_to_top-show');
        }
    }

    function backToTop() {
        if (window.pageYOffset > 0) {
            window.scrollBy(0, -80);
            setTimeout(backToTop, 0);
        }
    }

    if (document.querySelector('.back_to_top')) {
        var goTopBtn = document.querySelector('.back_to_top');

        window.addEventListener('scroll', trackScroll);
        goTopBtn.addEventListener('click', backToTop);
    }
})();
/* end begin Back to Top button  */