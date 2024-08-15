document.addEventListener("DOMContentLoaded", function() {
  // Function to create or update the pie chart
  function createOrUpdatePieChart() {
    var capacityValue = document.getElementById('Kapasitas').innerHTML.trim();
    if (!capacityValue) {
      console.error("Error: Capacity value not found or empty.");
      return;
    }

    var capacity = parseInt(capacityValue);
    var remaining = 100 - capacity;

    var ctx = document.getElementById('capacityChart').getContext('2d');

    // Check if chart instance already exists
    if (window.capacityChart) {
      // Update existing chart with new data
      window.capacityChart.data.datasets[0].data = [capacity, remaining];
      window.capacityChart.update();
    } else {
      // Create new chart instance
      window.capacityChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Capacity', 'Remaining'],
          datasets: [{
            data: [capacity, remaining],
            backgroundColor: ['#FF6384', '#36A2EB']
          }]
        }
      });
    }
  }

  // Call createOrUpdatePieChart function when DOM is ready
  createOrUpdatePieChart();

  // Observe changes in capacity element using MutationObserver
  var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'childList' && mutation.target.id === 'Kapasitas') {
        createOrUpdatePieChart();
      }
    });
  });

  // Start observing changes in capacity element
  observer.observe(document.getElementById('Kapasitas'), { childList: true });
});