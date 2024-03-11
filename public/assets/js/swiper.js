function CustomSwiper (classSwiper, slideView) {
    return  new Swiper(classSwiper, {
        slidesPerView: slideView,
        spaceBetween: 6,
        navigation: {
        nextEl: ".next",
        prevEl: ".prev",
        },
    });
    
}





