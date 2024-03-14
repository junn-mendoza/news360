

const toggleMute = () => {
    soundIndex = swiperEl.activeIndex;
    video = document.querySelector('#v' + soundIndex);
    if (video) {

        video.muted = !video.muted;
        if (video.muted) {
            muteToggleElement.innerHTML = `<svg stroke="#FFF" width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="m18 23-9.305-5.998.835-.651L17 21.166v-10.65l1-.781V23zm0-15.794L23.384 3l.616.788L.616 22.052 0 21.264 5.46 17H3V7h5.691L18 1v6.206zM6.74 16 8 15.016V8H4v8h2.74zM17 7.987V2.834L9 7.991v6.244l8-6.248z" /></svg>`;
        } else {
            muteToggleElement.innerHTML = `<svg stroke="transparent" fill='#fff' strole-width="0" width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path
  d="M11.553 3.064A.75.75 0 0 1 12 3.75v16.5a.75.75 0 0 1-1.255.555L5.46 16H2.75A1.75 1.75 0 0 1 1 14.25v-4.5C1 8.784 1.784 8 2.75 8h2.71l5.285-4.805a.752.752 0 0 1 .808-.13ZM10.5 5.445l-4.245 3.86a.748.748 0 0 1-.505.195h-3a.25.25 0 0 0-.25.25v4.5c0 .138.112.25.25.25h3c.187 0 .367.069.505.195l4.245 3.86Zm8.218-1.223a.75.75 0 0 1 1.06 0c4.296 4.296 4.296 11.26 0 15.556a.75.75 0 0 1-1.06-1.06 9.5 9.5 0 0 0 0-13.436.75.75 0 0 1 0-1.06Z"
/>
<path d="M16.243 7.757a.75.75 0 1 0-1.061 1.061 4.5 4.5 0 0 1 0 6.364.75.75 0 0 0 1.06 1.06 6 6 0 0 0 0-8.485Z"
/>
</svg>`;
        }
    }

}

const swiperEl = new Swiper('.home-banner', {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
    slidesPerView: 1,
    on: {
        afterInit(e) {
            playCurrentVideo(e);
        },
        slideChange(e) {
            playCurrentVideo(e);
        },
    }
});
let muteToggleElement = document.querySelector('#muteToggle');
muteToggleElement.innerHTML = `<svg stroke="#FFF" width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="m18 23-9.305-5.998.835-.651L17 21.166v-10.65l1-.781V23zm0-15.794L23.384 3l.616.788L.616 22.052 0 21.264 5.46 17H3V7h5.691L18 1v6.206zM6.74 16 8 15.016V8H4v8h2.74zM17 7.987V2.834L9 7.991v6.244l8-6.248z" /></svg>`;

let activeSwiperIndex = swiperEl.activeIndex;
let activeSwiper = swiperEl.slides[activeSwiperIndex];

function playCurrentVideo(e) {

    let vid = document.querySelectorAll('video')
    Array.prototype.slice.call(vid).map(v => {
        v.pause();
        v.muted = true
    })
    let muteToggleElement = document.querySelector('#muteToggle');
    if (muteToggleElement) {
        muteToggleElement.innerHTML = `<svg stroke="#FFF" width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="m18 23-9.305-5.998.835-.651L17 21.166v-10.65l1-.781V23zm0-15.794L23.384 3l.616.788L.616 22.052 0 21.264 5.46 17H3V7h5.691L18 1v6.206zM6.74 16 8 15.016V8H4v8h2.74zM17 7.987V2.834L9 7.991v6.244l8-6.248z" /></svg>`;
    }
    //
    Array.prototype.slice.call(vid).map((v, index) => {
        //console.log(index, swiperEl.swiper.activeIndex)
        if (index === e.activeIndex) {
            //Avoid the Promise Error
            setTimeout(function() {
                v.play();
            }, 150);

            v.addEventListener('ended', () => {
                e.slideNext();
            });
        }
    })
}
const checkEndedHandler = (e) => {
    if (!e) {
        e.window.event;
    }
    swiperEl.swiper.slideNext()
}
// Function to calculate and display time difference

window.onload = (event) => {
    let elem = document.querySelector('.overlay-video');
    if(elem) {
        let videoHeight = elem.clientHeight;
        //alert(videoHeight)
        let topHeader = document.querySelector('.topnewsHeader').clientHeight;
        //alert(topHeader)
        let topNews = document.getElementById('topnews')
        topNewsHeight = videoHeight - topHeader - 15;
        
        setTimeout(()=>{
            topNews.setAttribute("style","height:"+topNewsHeight+"px");
        }, 500)
        
        
    }
    // setTimeout(()=>{
    //     updateTimeDifference();
    // }, 5000)
    
   
};
