  function closeAcord()
  {
    $(document).click(function(e) {
      var elementClassName = e.target.className;  // get the classname of the element clicked
      $('#collapse' + e.target.className).collapse();
    });
  }
