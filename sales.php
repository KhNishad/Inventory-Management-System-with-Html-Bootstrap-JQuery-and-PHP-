<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) { {
        header("location:" . DOMAIN . "/");
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="./includes/style.css"> -->
    <script src="https://kit.fontawesome.com/97c02f89cd.js"></script>
    <script type="text/javascript" rel="stylesheet" src="./js/manage.js"></script>
</head>

<body>
    <?php include_once("./templates/header.php"); ?>
    <br /><br />

    <div class="container">
        <div class="row py-5">
            <div class="col-xl-4 py-2">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h4 class="card-title text-center">Total Sales</h4>
                        <h1 class="card-text sales text-center" id="sales"></h1>

                    </div>
                </div>
            </div>
           
            <div class="col-xl-4 py-2">
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <h4 class="card-title text-center">Total Profit $</h4>
                        <h1 class="card-text profit text-center"> </h1>

                    </div>
                </div>
            </div>

            <div class="col-xl-4 py-2">
                <div class="card bg-dark text-light">
                    <div class="card-body ">
                        <h4 class="card-title text-center">Top Product</h4>
                        <h2 class="card-text top text-center"></h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
            <div class="col-sm-12 md-6 mb-5">
                <table class="table table-hover table-bordered table-dark table-striped">
                    <thead class="thead-light" <tr>
                        <th>NO:</th>
                        <th>Invoice No</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Customer Name</th>
                        <th>Net Total</th>
                        <th>Paid</th>
                        <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody id="get_sales">
                         <tr>
                    <td>1</td>
                    <td>Electronics</td>
                    <td>Root</td>
                    <td><a href="#" class="btn btn-success btn-sm"> Active</a></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                        <a href="#" class="btn btn-primary btn-sm"> Edit</a>
                    </td>
                </tr> 

                    </tbody>
                </table>
            </div>
        </div>

    </div> -->
    <!-- update cat -->
    <div class="container">
        <br />
        <div class="form-group text-right">
            <!-- <div class="input-group">
                <h5 class="input-group-addon">Search </h5>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
            </div> -->
            <form class="form-inline md-form form-sm mt-0">
                <i class="fas fa-search fa-2x text-danger" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" name="search_text" id="search_text" type="text" placeholder="Search for Customer" aria-label="Search">
            </form>
        </div>
        <br />
        <div id="result"></div>
    </div>



    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "./includes/fetch_sales.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>

</body>

</html>