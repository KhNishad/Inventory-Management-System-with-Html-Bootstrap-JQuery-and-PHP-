<?php
include_once("./database/constants.php");
    if (!isset($_SESSION["userid"])) {
        header("location:" . DOMAIN . "/");
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to Nano tech</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/97c02f89cd.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
</head>

<body>
    <!-- navbar -->
    <?php include_once("./templates/header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        <p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
                        <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
                        <a href="manage_categories.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card  bg-dark text-white">
                    <div class="card-body">
                        <h4 class="card-title">Brands</h4>
                        <p class="card-text">Here you can manage your brand and you add new brand</p>
                        <a href="#" data-toggle="modal" data-target="#brand" class="btn btn-primary">Add</a>
                        <a href="manage_brand.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card  bg-dark text-white">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        <p class="card-text">Here you can manage your prpducts and you add new products</p>
                        <a href="#" data-toggle="modal" data-target="#product" class="btn btn-primary">Add</a>
                        <a href="manage_product.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>