var x = document.getElementById("jsanum").innerHTML;
for (i = 0; i < x; i++) {
new Chart(document.getElementById("radar-chart" + val), {
    type: 'radar',
    data: {
        labels: question,
        datasets: [
        {
          label: "Average Question Score",
          fill: true,
          backgroundColor: "rgba(125,165,68,0.5)",
          borderColor: "#7DA544",
          pointBorderColor: "#fff",
          pointBackgroundColor: "#7DA544",
          pointBorderColor: "#fff",
          data: scores
        }
      ]
    },
});
}
// --------- Review Questionair -----------
function closeAcord()
{
  $(document).click(function(e) {
    var elementClassName = e.target.className;  // get the classname of the element clicked
    $('#collapse' + e.target.className).collapse();
  });
}
$(document).ready(function () {
  $(".navbar-nav li a").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
});
$(function() {
    $('.scroll-down').click (function() {
      $('html, body').animate({scrollTop: $('section.ok').offset().top }, 'slow');
      return false;
    });
  });
