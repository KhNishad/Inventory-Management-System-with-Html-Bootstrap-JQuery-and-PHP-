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
    <script src="https://kit.fontawesome.com/97c02f89cd.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./includes/style.css">
    <script type="text/javascript" rel="stylesheet" src="./js/manage.js"></script>
</head>

<body>

    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br /><br />
    <div class="container">
        
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>NO:</th>
                    <th>Category</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="get_category">
                <!-- <tr>
                    <td>1</td>
                    <td>Electronics</td>
                    <td>Root</td>
                    <td><a href="#" class="btn btn-success btn-sm"> Active</a></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                        <a href="#" class="btn btn-primary btn-sm"> Edit</a>
                    </td>
                </tr> -->

            </tbody>
        </table>
    </div>
    <!-- update cat -->

    <?php
    include_once("./templates/update_catagory.php");
    ?>
</body>

</html>