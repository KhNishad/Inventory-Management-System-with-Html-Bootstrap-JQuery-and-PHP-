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
    <title>Inventory Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/97c02f89cd.js"></script>
    <script type="text/javascript" src="./js/order.js"></script>
</head>

<body>
    <div class="overlay">
        <div class="loader"></div>
    </div>
    <!-- Navbar -->
    <?php include_once("./templates/header.php"); ?>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                    <div class="card-header text-center">
                        <h4>New Orders</h4>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <form id="get_order_data" onsubmit="return false">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" align="right">Order Date</label>
                                <div class="col-sm-6">
                                    <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
                                <div class="col-sm-6">
                                    <input type="text" id="cust_name" name="cust_name" class="form-control form-control-sm" placeholder="Enter Customer Name" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" align="right">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" id="phone" name="phone" class="form-control form-control-sm" placeholder="Enter Phone Number" required />
                                </div>
                            </div>


                            <div class="card  bg-dark" style="box-shadow:0 0 5px 0 lightgrey;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h3 class="">New Order List</h3>
                                    </div>
                                    <br>

                                    <table align="center" style="width:800px;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th style="text-align:center;">Item Name</th>
                                                <th style="text-align:center;">Total Quantity</th>
                                                <th style="text-align:center;">Quantity</th>
                                                <th style="text-align:center;">Price</th>
                                                <!-- <th style="text-align:center;">Stock Price</th> -->
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody id="invoice_item">
                                            <!--<tr>
		    <td><b id="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm" required>
		            <option>Washing Machine</option>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
		    <td>Rs.1540</td>
		</tr>-->
                                        </tbody>


                                    </table>
                                    <!--Table Ends-->
                                    <center style="padding:10px;">
                                        <button id="add" style="width:150px;" class="btn btn-success">Add</button>
                                        <button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
                                    </center>
                                </div>
                                <!--Crad Body Ends-->
                            </div> <!-- Order List Crad Ends-->

                            <p></p>
                            <div class="form-group row">
                                <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required />
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="gst" class="col-sm-3 col-form-label" align="right">Revenue%</label>
                                <div class="col-sm-6">
                                    <input type="text" name="profit" class="form-control form-control-sm" id="profit" required />
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="discount" class="col-sm-3 col-form-label" align="right">Revenue%</label>
                                <div class="col-sm-6">
                                    <input type="text" name="discount" class="form-control form-control-sm" id="discount" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                                <div class="col-sm-6">
                                    <input type="text" name="paid" class="form-control form-control-sm" id="paid">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gst" class="col-sm-3 col-form-label" align="right">Total Profit</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="t_profit" class="form-control form-control-sm" id="t_profit" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method</label>
                                <div class="col-sm-6">
                                    <select name="payment_type" class="form-control form-control-sm" id="payment_type" required />
                                    <option>Cash</option>
                                    <option>Bkash</option>
                                    <option>Card</option>

                                    </select>
                                </div>
                            </div>

                            <center>
                                <input type="submit" id="order_form" style="width:150px;" class="btn btn-success" value="Order">
                                <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                            </center>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>