<?php
require_once('../Connection/dbconnection.php');

// Connect to your database (replace with your actual credentials)

// Fetch data for Data Set 1 (replace with your actual query)
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($data);
?>
