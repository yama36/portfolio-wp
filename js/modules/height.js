$(function(){
  var sidebarHeight = $("#sidebar").height();
  var biggestHeight = 0;
  var containerHeight = 0;

  if ($(window).width() > 900 ) {
    $("#blog-container > *").each(function(){
      containerHeight = containerHeight + $(this).height();
      if ($(this).height() >= biggestHeight ) {
        biggestHeight = $(this).height();
      }
    });

    if (biggestHeight > sidebarHeight) {
      containerHeight = containerHeight - sidebarHeight;
      $("#blog-container").height(containerHeight);
    } else {
      $("#blog-container").height(sidebarHeight);
    }
  }
})