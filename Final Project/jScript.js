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
          backgroundColor: "rgba(255,99,132,0.2)",
          borderColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          data: scores
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Distribution in % of world population'
      }
    }
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
