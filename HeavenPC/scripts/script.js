const bannerSwiper = new Swiper('.banner-swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  speed: 500,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
      delay: 5000,
  },
});

const popSwiper = new Swiper('.pop-swiper', {
direction: 'horizontal',
spaceBetween: '20px',
speed: 500,
navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},
breakpoints: {
  1200: {

    slidesPerView: 4,
  },
  992: {
    slidesPerView: 3,
  },
  570:
  {
    slidesPerView: 3,
  },
  0:
  {
    slidesPerView: 2,
  },
},
});

const recommendedSwiper = new Swiper('.recommended-swiper', {
direction: 'horizontal',
slidesPerView: 5,
spaceBetween: 10,
loop: true,
speed: 500,
navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},
breakpoints: {
  1200: {
    slidesPerView: 5,
  },
  992:
  {
    slidesPerView: 4,
  },
  768:
  {
    slidesPerView: 4,
  },
  570:
  {
    slidesPerView: 3,
  },
  0:
  {
    slidesPerView: 2,
  },
},
autoplay: {
  delay: 6000,
},
});


window.addEventListener('scroll', function() {
  const header = document.querySelector('header');
  if (window.scrollY > 0) {
    header.classList.add('shadow');
  } else {
    header.classList.remove('shadow');
  }
});
