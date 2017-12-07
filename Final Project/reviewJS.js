$(function() {
    $('.scroll-down').click (function() {
      $('html, body').animate({scrollTop: $('section.ok').offset().top }, 'slow');
      return false;
    });
  });
  function closeAcord()
  {
    $(document).click(function(e) {
      var elementClassName = e.target.className;  // get the classname of the element clicked
      $('#collapse' + e.target.className).collapse();
    });
  }
