<?php
// Assuming you have established a database connection
// Note: Order will be generated everyday if there is no order that was placed for that day.
$host = 'localhost'; // Your database host
$db = 'venormall'; // Your database name - test db - chart
$user = 'root'; // Your database username
$password = ''; // Your database password

// Create a database connection
$connection = mysqli_connect($host, $user, $password, $db);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Fetch order data based on the selected time period and year
function fetchOrderData($connection, $timePeriod, $year, $month = null) {
    // Query to retrieve order data based on the selected time period and year
    if ($timePeriod == "YEAR") {
        $query = "SELECT YEAR(order_date) AS order_year, SUM(order_total) AS total_price FROM orders GROUP BY YEAR(order_date)";
    } elseif ($timePeriod == "DAY") {
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date, SUM(order_total) AS total_price FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = $year GROUP BY DATE_FORMAT(order_date, '%Y-%m-%d')";
    } else {
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date, SUM(order_total) AS total_price FROM orders WHERE YEAR(order_date) = $year GROUP BY MONTH(order_date)";
    }

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Initialize an empty array to store the fetched data
    $data = [];

    // Fetch and format the data
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row['total_price'];
    }

    // Return the fetched data
    return $data;
}

// Get the selected time period and year from the AJAX request
if (isset($_POST['timePeriod']) && isset($_POST['year'])) {
    $timePeriod = $_POST['timePeriod'];
    $year = $_POST['year'];

    // For daily option, get the selected month as well
    $month = null;
    if ($timePeriod == "DAY" && isset($_POST['month'])) {
        $month = $_POST['month'];
    }

    // Fetch order data based on the selected time period and year
    $orderData = fetchOrderData($connection, $timePeriod, $year, $month);

    // Send the order data as a JSON response
    echo json_encode($orderData);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "htp.js"></script>
</head>

<body>
    <div style="margin: auto;width: 80%;">
        <div>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="handleClick('DAY')">Daily</button>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="handleClick('MONTH')">Monthly</button>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="handleClick('YEAR')">Yearly</button>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="printChart()">Print</button>
            <select id="year" onchange="changeyear()">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <!-- Add more options for years -->
            </select>
            <select id="month" onchange="changemonth()" style="display: none;">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
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
        </div>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Create a chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Sales',
                    data: [], // Initial empty data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: '#000',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return '₦ ' + value;
                            }
                        }
                    }
                }
            }
        });

        // Function to fetch order data based on the selected time period and year
        function fetchOrderData(timePeriod, year, month = null) {
            $.ajax({
                type: 'POST',
                url: 'main.php', // Replace with the actual filename of your PHP script
                data: {
                    timePeriod: timePeriod,
                    year: year,
                    month: month
                },
                success: function(response) {
                    var orderData = JSON.parse(response);

                    if (timePeriod == "YEAR") {
                        chart.data.labels = [2021,2022,2023,2024,2025,2026,2027,2028,2029,2030];
                        $('#year').hide();
                        $('#month').hide();
                    } else if (timePeriod == "MONTH") {
                        chart.data.labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $('#year').show();
                        $('#month').hide();
                    } else if (timePeriod == "DAY") {
                        var daysInMonth = new Date(year, month, 0).getDate();
                        chart.data.labels = Array.from({ length: daysInMonth }, (_, i) => {
                            var day = i + 1;
                            var suffix = getNumberSuffix(day);
                            return day + suffix;
                        });
                        //$('#year').show();
                        $('#month').show();
                    }

                    chart.data.datasets[0].data = orderData;
                    chart.update();
                }
            });
        }
        //Get the suffix of the date label
        function getNumberSuffix(day) {
            var suffix = "th";
            if (day >= 11 && day <= 13) {
                suffix = "th";
            } else {
                switch (day % 10) {
                case 1:
                    suffix = "st";
                    break;
                case 2:
                    suffix = "nd";
                    break;
                case 3:
                    suffix = "rd";
                    break;
                }
            }
            return suffix;
        }

        // Function to handle button click event
        function handleClick(timePeriod) {
            if(timePeriod == "YEAR"){
                document.getElementById("year").style.display = 'none'
            }
            else if(timePeriod == "DAY"){
                document.getElementById("year").style.display = 'none'
            }
            else{
                document.getElementById("year").style.display = 'inline-block'
            }
            var year = document.getElementById('year').value;
            // For daily option, get the selected month as well
            var month = null;
            if (timePeriod === 'DAY') {
                month = document.getElementById('month').value;
            }

            // Fetch order data based on the selected time period and year
            fetchOrderData(timePeriod, year, month);
        }
        function changemonth(){
            var month = document.getElementById('month').value
            var currentYear = new Date().getFullYear();
            fetchOrderData("DAY", currentYear-2, month);
        }
        function changeyear(){
            var year = document.getElementById('year').value
            var month = null
            fetchOrderData("MONTH", year, month);
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
</body>

</html>
