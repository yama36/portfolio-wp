var count = 25;

$(".post-post").each(function() {
  var thisText = $(this).text();
  var thisLength = thisText.length;
  if (thisLength > count) {
    var showText = thisText.substring(0, count);
    $(this).html(showText += '...');
  }
})