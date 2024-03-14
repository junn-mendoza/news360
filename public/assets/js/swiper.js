function CustomSwiper (classSwiper, slideView) {
    return  new Swiper(classSwiper, {
        slidesPerView: slideView,
        spaceBetween: 10,
        navigation: {
            nextEl: ".next",
            prevEl: ".prev",
        },
    });
    
}

function CategorySwiper (classSwiper, slideView) {
    return  new Swiper(classSwiper, {
        slidesPerView: slideView,
        spaceBetween: 10,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true
          },
        
        on: {
            autoplayTimeLeft(s, time, progress) {
              progressCircle.style.setProperty("--progress", 1 - progress);
              progressContent.textContent = `${Math.ceil(time / 1000)}s`;
            }
          }
    });
    
}

function NewsFeaturedSwiper (classSwiper, slideView) {
  return  new Swiper(classSwiper, {
      slidesPerView: slideView,
      autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
      
      on: {
          autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
          }
        }
  });
  
}




