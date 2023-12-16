<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https:////cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="col">
            <?php include_once("venheader.php"); ?>
            <div class="row">

                <div class="col-sm-12 shadow-lg p-3 mb-5 bg-white rounded my-5">

                    <h1 style="text-align: center; background-color:#ADD8E6;" class="bg-warning">Event Management System
                    </h1>
                    <div id="result" style="color: green; text-align:center;"></div>


                    <center>

                        <div class=" col-sm-6 shadow p-3 mb-5 bg-warning rounded" style="margin-top: 45px;">
                            <table>
                                <tr>
                                    <th cols="6"> <button style="color:white" class="btn btn-success"
                                            id="your_item">Your Item</button>
                                    </th>
                                    <th> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
    Add New Item
</button>
                                    </th>
                                    <th> <button style="color:white" class="btn btn-success"
                                            id="transaction">Transaction</button>
                                    </th>
                                    <th> <button style="color:white" class="btn btn-success"
                                            id="logout">Logout</button>
                                    </th>
                                </tr>
                            </table><br>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-group" action="vendorcontroller.php" id="product_form" accept=".jpg, .png, .jpeg, .gif" enctype="multipart/form-data">


<div class="form-group row">
    <label for="Login_type"
        class="col-sm-2 col-form-label"><b>Product Name</b></label>
    <div class="col-sm-10">
         <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" >
    </div>
</div>
<div class="form-group row">
    <label for="user_id" class="col-sm-2 col-form-label"><b>Product Price</b></label>
    <div class="col-sm-10">
        <input type="text" name="price" placeholder="Enter Product Price"
            class="form-control" id="price">
    </div>
    <div id="result"></div>
</div><br>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label"><b>Upload Image</b></label>
    <div class="col-sm-10">
        <input type="file" name="uploadfile" 
            class="form-control" id="uploadfile">
    </div>

</div><br>

<center> <button style="color:white" class="btn btn-success">Submit</button>
</center>

</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Add The Product</button> -->
            </div>
        </div>
    </div>
</div>

                            <table id="dataTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Image Url</th>
                                        <!-- <th>Age</th> -->
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be populated dynamically -->
                                </tbody>
                            </table>

                            <!-- Buttons to load different data -->
                            <!-- <button id="loadData1">Load Data Set 1</button>
<button id="loadData2">Load Data Set 2</button> -->

                            <script>
                                $(document).ready(function () {
                                    var dataTable = $('#dataTable').DataTable();
                                    loadData('getproduct.php');
                                    // Function to load data using AJAX
                                    function loadData(url) {
                                        $.ajax({
                                            url: url,
                                            method: 'GET',
                                            dataType: 'json',
                                            success: function (data) {
                                                // Clear existing data
                                                dataTable.clear().draw();

                                                // Populate DataTable with new data
                                                $.each(data, function (index, item) {
                                                    dataTable.row.add([
                                                        item.id,
                                                        item.product_name,
                                                        item.product_price,
                                                        item.product_image
                                                        // Add more columns as needed
                                                    ]).draw(false);
                                                });
                                            },
                                            error: function (xhr, status, error) {
                                                console.error('Error fetching data:', status, error);
                                            }
                                        });
                                    }

                                    // Click event for the buttons to load different data sets
                                    $('#maintain_vendor').click(function () {
                                        loadData('getvendor.php'); // Replace with the actual URL for Data Set 1
                                    });

                                    $('#maintain_user').click(function () {
                                        loadData('getuser.php'); // Replace with the actual URL for Data Set 2
                                    });
                                    $('#logout').click(function () {
                                        setTimeout(function () {
                                    $("#result").remove();
                                    window.location.href = '../index.php';
                                }, 2000);
                                         // Replace with the actual URL for Data Set 2
                                    });
                                });
                            </script>
                            <script>

$(document).ready(function () {
    $("#product_form").submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally
        var formData = $(this).serialize(); // Serialize the form data
         var resume = $('#resume').val();
        //  console.log(resume);

                $.ajax({
                type: "POST",
                url: $(this).attr('action'), // Replace with the URL of your servlet
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function (response) {
                    // Handle the response from the server
                    //                    console.log(response);
                    $('#myModal').modal('hide');
                    $("#result").focus();
                    $("#result").html(response);
                    

                    // setTimeout(function () {
                    //     $('#result').remove();
                    //     window.location.href='vendorhome.php';
                    // }, 5000);

//                                
                },
                error: function (xhr, textStatus, errorThrown) {
                    // Handle any errors that occur during the AJAX request
                    console.error("Error: " + errorThrown);
                }
            });
        
            

       

    });
});
</script>

                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                                crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                                crossorigin="anonymous"></script>
                                <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>