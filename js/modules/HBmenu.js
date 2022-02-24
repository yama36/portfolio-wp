$(function() {
  $('.hamburger, .menuBackGround').click(function() {
      $('.hamburger').toggleClass('active');

      if ($('.hamburger').hasClass('active')) {
          $('.globalMenuSp').addClass('active');
          $('.menuBackGround').addClass('active');
          $("html").addClass("is-fixed");
      } else {
          $('.globalMenuSp').removeClass('active');
          $('.menuBackGround').removeClass('active');
          $("html").removeClass("is-fixed");
      }
  });
});