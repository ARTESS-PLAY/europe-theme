new Swiper('.swiper', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    loop: true,
    slidesPerView: 2,
    spaceBetween: -50,

    breakpoints: {
        499: {
            slidesPerView: 3,
        },
        1000: {
            slidesPerView: 4,
        },
        1200: {
            slidesPerView: 8,
        }
    }
});

new Swiper('.swiper-articles', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    loop: true,
    slidesPerView: 1,

    breakpoints: {
        750: {
            slidesPerView: 2,
        },
        999: {
            slidesPerView: 3,
        },
        1280: {
            slidesPerView: 4,
        }
    }
});

new Swiper('.swiper-recommendations', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    loop: true,
    slidesPerView: 1,

    breakpoints: {
        499: {
            slidesPerView: 2,
        },
        999: {
            slidesPerView: 3,
        },
        1280: {
            slidesPerView: 7,
        }
    }
});