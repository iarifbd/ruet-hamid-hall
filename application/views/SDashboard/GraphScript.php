
        <!-- area chat -->
        <script>
            // Get the chart data passed from the controller
            var chartData = <?= $area_chart_data; ?>;

            // Initialize the Chart
            var ctx = document.getElementById('myAreaChart').getContext('2d');
            var myAreaChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


        <!-- Bar Chart Script -->
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Example
            var ctx = document.getElementById("myBarChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($bar_chart_data['labels']); ?>, // Dynamic labels from PHP
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: <?= json_encode($bar_chart_data['data']); ?>, // Dynamic data from PHP
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        </script>
