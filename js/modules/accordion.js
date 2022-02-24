$(function(){
  $('.HBbtn').each(function(){
      $(this).on('click',function(){
          $(this).parent().next(".HBinner").slideToggle();
          $(this).toggleClass("appear");
      });
  });
});