for (i = 1; i < 5; i++) {
new Chart(document.getElementById("radar-chart" + i), {
    type: 'radar',
    data: {
      labels: ["Student Experience", "Connection to Campus", "Feasability and Support", "Schedule and Budget", "Accountability", "Innovation", "Enviromental Benefits", "Regional Connection", "Outreach and Education", "Self Sufficiency", "Potential", "Cost/Benefit Analysis"],
      datasets: [
        {
          label: "Average Question Score",
          fill: true,
          backgroundColor: "rgba(255,99,132,0.2)",
          borderColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(255,99,132,1)",
          pointBorderColor: "#fff",
          data: [5,4.16,2.61,4.06,4.45,1,2.5,5,4.5,2,0,3]
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
