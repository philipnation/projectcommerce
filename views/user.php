<?php
// Get the ID and name values from the GET parameters

var_dump($_GET);

$id = $_GET['param1'];
$name = $_GET['name'];

// Use the retrieved values as needed
echo "User ID: $id<br>";
echo "User Name: $name";
?>