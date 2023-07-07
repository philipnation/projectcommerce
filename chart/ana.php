<?php
// Assuming you have established a database connection
$host = 'localhost'; // Your database host
$db = 'chart'; // Your database name
$user = 'root'; // Your database username
$password = ''; // Your database password

// Create a database connection
$connection = mysqli_connect($host, $user, $password, $db);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Fetch order data based on the selected time period and year
function fetchOrderData($connection, $timePeriod, $year) {
    // Query to retrieve order data based on the selected time period and year
    if($timePeriod == "YEAR"){
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date, SUM(order_price) AS total_price FROM orders GROUP BY $timePeriod(order_date)";
    }
    elseif($timePeriod == "DAY"){
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date, SUM(order_price) AS total_price FROM orders WHERE MONTH(order_date) = '01' AND YEAR(order_date) = $year GROUP BY $timePeriod(order_date)";
    }
    else{
        $query = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d') AS order_date, SUM(order_price) AS total_price FROM orders WHERE YEAR(order_date) = $year GROUP BY $timePeriod(order_date)";
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

    // Fetch order data based on the selected time period and year
    $orderData = fetchOrderData($connection, $timePeriod, $year);

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
</head>
<body>
    <div style="margin: auto;width: 80%;">
        <div>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="handleClick('DAY')">Daily</button>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="handleClick('MONTH')">Monthly</button>
            <button class="btn btn-primary" style="border-radius: 0px;padding: 5px;" onclick="handleClick('YEAR')">Yearly</button>
            <select id="year">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <!-- Add more options for years -->
            </select>
        </div>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Create a chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Sales',
                    data: [], // Initial empty data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
        function fetchOrderData(timePeriod, year) {
            $.ajax({
                type: 'POST',
                url: 'ana.php', // Replace with the actual filename of your PHP script
                data: {
                    timePeriod: timePeriod,
                    year: year
                },
                success: function(response) {
                    var orderData = JSON.parse(response);
                    //alert(orderData)
                    // Update the chart data with the fetched order data
                    if(timePeriod == "YEAR"){
                        chart.data.labels = ['2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028'];
                    }
                    else if(timePeriod == "MONTH"){
                        chart.data.labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    }
                    else if(timePeriod == "DAY"){
                        chart.data.labels = [1,2,3,4,5,6,7,8,9,0,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
                    }
                    chart.data.datasets[0].data = orderData;
                    chart.update();
                }
            });
        }

        // Function to handle button click event
        function handleClick(timePeriod) {
            var year = document.getElementById('year').value;

            // Fetch order data based on the selected time period and year
            fetchOrderData(timePeriod, year);
        }
    </script>
</body>
</html>
