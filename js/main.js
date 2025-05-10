const appointmentsByDay_options = {
  series: [],
  chart: {
    height: 250,
    type: "area",
    distributed: true,
    toolbar: {
      show: true,
      tools: {
        download: true,
        selection: true,
        zoom: false,
        zoomin: true,
        zoomout: true,
        pan: false,
        reset: false | '<img src="/static/icons/reset.png" width="20">',
        customIcons: [],
      },
    },
  },
  legend: {
    show: false,
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    type: "datetime", // Use datetime format for the x-axis
    categories: [],
  },
  tooltip: {
    x: {
      format: "MMMM yyyy", // Format the tooltip for the date
    },
  },
};

// Fetch data from the backend and update the chart
$.getJSON("/dental-appointment-system/get_appointments_by_day.php", function (data) {
  // Populate the chart's categories (dates) and series (appointments)
  appointmentsByDay_options.series = [
    {
      name: "Appointments",
      data: data.appointments, // Number of appointments per day
    },
  ];
  appointmentsByDay_options.xaxis.categories = data.dates; // Dates for x-axis

  // Re-render the chart with the fetched data
  const appointmentsByDay = new ApexCharts(
    document.querySelector("#appointmentsByDayChart"),
    appointmentsByDay_options
  );
  appointmentsByDay.render();
}).fail(function () {
  alert("Error loading data");
});

// Initialize the Pie Chart options
const appointmentStatusPie_options = {
    series: [],
    chart: {
      height: 300,
      type: "donut",
    },
    labels: [],  // This will be populated with appointment statuses
    tooltip: {
      y: {
        formatter: function (val) {
          return val + " Appointments"; // Show the number of appointments when hovering
        },
      },
    },
    legend: {
        show: 'true',
        position: 'bottom'
      },
    responsive: [
      {
        breakpoint: 480,
        options: {
          chart: {
            width: 200,
          },
          legend: {
            position: "bottom",
          },
        },
      },
    ],
  };
  
  // Fetch data from the backend and update the pie chart
  $.getJSON("/dental-appointment-system/get_appointment_status_distribution.php", function (data) {
    // Populate the chart's series (counts) and labels (statuses)
    appointmentStatusPie_options.series = data.counts;  // Appointment counts for each status
    appointmentStatusPie_options.labels = data.statuses;  // Appointment statuses (Confirmed, Cancelled, etc.)
  
    // Create and render the pie chart
    const appointmentStatusPieChart = new ApexCharts(
      document.querySelector("#appointmentStatusPieChart"),
      appointmentStatusPie_options
    );
    appointmentStatusPieChart.render();
  }).fail(function () {
    alert("Error loading data for the status distribution chart");
  });
  