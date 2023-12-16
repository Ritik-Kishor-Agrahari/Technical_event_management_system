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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https:////cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https:////cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="col">
            <?php include_once("header.php"); ?>
            <div class="row">

                <div class="col-sm-12 shadow-lg p-3 mb-5 bg-white rounded my-5">

                    <h1 style="text-align: center; background-color:#ADD8E6;" class="bg-warning">Event Management System
                    </h1>
                    <div id="result" style="color: green; text-align:center;"></div>
                    
                    
                    <center>
                        
                        <div class=" col-sm-6 shadow p-3 mb-5 bg-warning rounded" style="margin-top: 45px;" >
                        <table>
                        <tr><th cols="6"> <button style="color:white" class="btn btn-success" id="maintain_user">Maintain User</button>
</th><th> <button style="color:white" class="btn btn-success" id="maintain_vendor">Maintain Vendor</button>
</th></tr>
                        </table><br>
                        <table id="dataTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
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
$(document).ready(function() {
    var dataTable = $('#dataTable').DataTable();
    loadData('getuser.php');
    // Function to load data using AJAX
    function loadData(url) {
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Clear existing data
                dataTable.clear().draw();

                // Populate DataTable with new data
                $.each(data, function(index, item) {
                    dataTable.row.add([
                        item.id,
                        item.name,
                        item.userid
                        // Add more columns as needed
                    ]).draw(false);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    // Click event for the buttons to load different data sets
    $('#maintain_vendor').click(function() {
        loadData('getvendor.php'); // Replace with the actual URL for Data Set 1
    });

    $('#maintain_user').click(function() {
        loadData('getuser.php'); // Replace with the actual URL for Data Set 2
    });
});
</script>
              
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                    crossorigin="anonymous"></script>
</body>

</html>