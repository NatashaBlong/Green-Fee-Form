for (i = 1; i < 5; i++) {
new Chart(document.getElementById("radar-chart" + i), {
    type: 'radar',
    data: {
      labels: ["Student Experience", "Connection to Campus", "Feasability and Support", "Schedule and Budget", "Accountability", "Innovation", "Enviromental Benefits", "Regional Connection", "Outreach and Education", "Self Sufficiency", "Potential", "Cost/Benefit Analysis"],
      //labels: [questions[0],questions[1],questions[2],questions[3],questions[4],questions[5],questions[6],questions[7],questions[8],questions[9],questions[10],questions[11],questions[12]],
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
          //data: [5,4.16,2.61,4.06,4.45,1,2.5,5,4.5,2,0,3]
          //data: [scores[0],scores[1],scores[2],scores[3],scores[4],scores[5],scores[6],scores[7],scores[8],scores[9],scores[10],scores[11],scores[12]]
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
