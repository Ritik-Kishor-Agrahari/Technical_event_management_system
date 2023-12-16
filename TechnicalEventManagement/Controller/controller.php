<?php
require_once('../Connection/dbconnection.php');

if(isset($_POST["login_type"]) && $_POST["login_type"] == "admin")
{
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE userid = '$userid' and password= '$password'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "admin";
        }
    } else {
       
        echo "<h4 style='color:red'>User Id and Password Not Matched.</h4>";
    }
}
if(isset($_POST["login_type"]) && $_POST["login_type"] == "vendor")
{
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $query = "SELECT * FROM vendor WHERE userid = '$userid' and password= '$password'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "3";
        }
    } else {
       
        echo "<h4 style='color:red'>User Id and Password Not Matched.</h4>";
    }
}

if(isset($_POST["admin"]) && $_POST["admin"]=="adminregistration"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "INSERT INTO admin (`name`,`userid`,`password`) VALUES('".$name."','".$email."','".$password."')";
    if(mysqli_query($conn,$query)) {
        echo "<h4>Registration Done.</h4>";
    } else {
        echo "<h4>Registration Not Done.</h4>";
    }
}
if(isset($_POST["user"]) && $_POST["user"]=="userregistration"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "INSERT INTO user (`name`,`userid`,`password`) VALUES('".$name."','".$email."','".$password."')";
    if(mysqli_query($conn,$query)) {
        echo "<h4 style='color:green;'>Registration Done.</h4>";
    } else {
        echo "<h4 style='color:red;'>Registration Not Done.</h4>";
    }
}
if(isset($_POST["vendor"]) && $_POST["vendor"]=="vendorregistration"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $category = $_POST["category"];
    $query = "INSERT INTO vendor (`name`,`category`,`userid`,`password`) VALUES('".$name."','".$category."','".$email."','".$password."')";
    if(mysqli_query($conn,$query)) {
        echo "<h4 style='color:green;'>Vendor Registration Done.</h4>";
    } else {
        echo "<h4 style='color:red;'>Vendor Registration Not Done.</h4>";
    }
}
if(isset($_GET["user"]) && $_GET["user"]== "userdata"){
    $sql = "SELECT * FROM your_table";
$result = mysqli_query($conn, $sql);
    $data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
}

mysqli_close($conn);    
?>