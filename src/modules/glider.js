import Glider from 'glider-js';

export default function glider() {

    window.addEventListener('load', function () {
        new Glider(document.querySelector('.carousel-lista'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            dots: '.carousel-indicadores',
            arrows: {
                prev: '.carousel-anterior',
                next: '.carousel-siguiente'
            },
            responsive: [
                {
                    // screens greater than >= 775px
                    breakpoint: 800,
                    settings: {
                        // Set to `auto` and provide item width to adjust to viewport
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        itemWidth: 150,
                        duration: 0.25
                    }
                }, {
                    // screens greater than >= 1024px
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        itemWidth: 150,
                        duration: 0.25
                    }
                }
            ]
        });

    });


}