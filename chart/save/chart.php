<?php
$january = 2;
$febuary = 4;
$march = 3;
$april = 5;
$may = 6;
$june = 9;
$july = 7;
$august = 1;
$september = 10;
$october = 4;
$november = 11;
$december = 13;

$monday = 12;
$tuesday = 5;
$wednesday = 6;
$thursday = 9;
$friday = 3;
$saturday = 8;
$sunday = 4;

$y1 = 50;
$y2 = 120;
$y3 = 180;
$y4 = 100;
$y5 = 122;
$y6 = 200;
$y7 = 190;
$y8 = 500;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- JavaScript (Optional - Only if you need Bootstrap's JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!--download image-->
    <script src = "htp.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Declare chart variable globally
        let chart;
        let week;
        let newweek;
        let month;
        let newmonthly;
        let year;
        let newyear;

        document.addEventListener('DOMContentLoaded', function() {
            // Get the canvas element
            const canvas = document.getElementById('myChart');
            week = document.getElementById('week');
            newweek = week.value.split(',').map(Number);
            month = document.getElementById('month');
            newmonthly = month.value.split(',').map(Number);
            year = document.getElementById('year');
            newyear = year.value.split(',').map(Number);

            // Create the chart
            chart = new Chart(canvas, {
                type: 'bar',
                data: {
                    labels:  ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'sales',
                        data: newmonthly,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {},
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return '₦ ' + value; // Add '₦' symbol to the y-axis labels
                                }
                            }
                        }
                    }
                }
            });
        });

        function weekly() {
            // Update the chart data and labels
            chart.data.labels = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
            newweek = week.value.split(',').map(Number);
            chart.data.datasets[0].data = newweek;
            
            // Update the chart
            chart.update();
        }

        function monthly() {
            // Update the chart data and labels
            chart.data.labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            newmonthly = month.value.split(',').map(Number);
            chart.data.datasets[0].data = newmonthly;
            
            // Update the chart
            chart.update();
        }

        function yearly() {
            // Update the chart data and labels
            chart.data.labels = ['2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'];
            newyear = year.value.split(',').map(Number);
            chart.data.datasets[0].data = newyear;
            
            // Update the chart
            chart.update();
        }
        
        function changeChartType() {
            const selectElement = document.getElementById('chartTypeSelect');
            const selectedValue = selectElement.value;
        
            // Update the chart type based on the selected value
            chart.config.type = selectedValue;
            chart.update();
        }

        function printChart() {
            var element = document.querySelector('#myChart');
			html2pdf().from(element).save('chart');//chart will be the name of the file.
        }
    </script>
</head>
<body>
    <div style="margin: auto;width: 80%;">
        <button class="btn btn-success" style="border-radius: 0px;padding: 5px;" onclick="weekly()">Weekly</button>
        <button class="btn btn-success" style="border-radius: 0px;padding: 5px;" onclick="monthly()">Monthly</button>
        <button class="btn btn-success" style="border-radius: 0px;padding: 5px;" onclick="yearly()">Yearly</button>
        <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="printChart()">Print</button>
        <select id="chartTypeSelect" onchange="changeChartType()">
            <option value="none">select view</option>
            <option value="line">Line</option>
            <option value="bar">Bar</option>
            <option value="pie">pie</option>
            <!--<option value="radar">radar</option>
            <option value="doughnut">doughnut</option>
            <option value="scatter">scatter</option>
            <option value="bubble">bubble</option>-->
        </select>
        <input type="text" id="week" value="<?php echo "$sunday,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday"; ?>" hidden>
        <input type="text" id="month" value="<?php echo "$january,$febuary,$march,$april,$may,$june,$july,$august,$september,$october,$november,$december"; ?>" hidden>
        <input type="text" id="year" value="<?php echo "$y1,$y2,$y3,$y4,$y5,$y6,$y7,$y8" ?>" hidden>
        <canvas id="myChart"></canvas>
        <p class="text-center">sales chart</p>
    </div>
</body>
</html>
