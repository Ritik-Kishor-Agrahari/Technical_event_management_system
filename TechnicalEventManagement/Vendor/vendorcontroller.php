<?php
require_once('../Connection/dbconnection.php');


$product_name = $_POST['product_name'];
$product_price = $_POST['price'];
$vendor_id=1;
$target_dir = "images/";  // Directory where the image will be stored
$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the file is an actual image
$check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
if ($check !== false) {
    
    $uploadOk = 1;
} else {
    
    $uploadOk = 0;
}

// Check if the file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, the file already exists.";
//     $uploadOk = 0;
// }

// Check the file size (adjust as needed)
if ($_FILES["uploadfile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats (adjust as needed)
$allowedFormats = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedFormats)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // If everything is OK, try to upload the file
    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["uploadfile"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "INSERT INTO product(`product_name`,`product_price`,`product_image`,`vendor_id`) VALUES('".$product_name."','".$product_price."','".$target_file."','".$vendor_id."')";
if(mysqli_query($conn, $sql)) {
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);
   
    echo "<h1 style='color:green;'>Product Added Successfully.</h1>";
}else{
    echo $sql;
    echo "<h1 style='color:red;'>Product Not Added Successfully.</h1>";
}


?>