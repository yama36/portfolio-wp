const w = document.body.clientWidth;

if (w < 1280) {
  const swiper = new Swiper('.swiper', {
    loop: true,
    direction: 'horizontal',
    slidesPerView: 1.4,
    centeredSlides: true,
    scrollvar: null,
    breakpoints: {
      600: {
        slidesPerView: 2,
      },
      900: {
        slidesPerView: 3,
      },
    },
  });
} else {
}