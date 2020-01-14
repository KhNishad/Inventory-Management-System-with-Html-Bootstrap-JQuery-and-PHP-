<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

//For Registration Processsing
if (isset($_POST["username"]) and isset($_POST["email"])) {
	$user = new User();
	$result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
	echo $result;
	exit();
}

//For Login Processing
if (isset($_POST["log_email"]) and isset($_POST["log_password"])) {
	$user = new User();
	$result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
	echo $result;
	exit();
}
// to get category
if (isset($_POST["getCategory"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("catagories");
	foreach ($rows as $row) {
		echo "<option value='" . $row["cid"] . "'>" . $row["catagory_name"] . "</option>";
	}
	exit();
}
// to get brands
if (isset($_POST["getbrand"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("brands");
	foreach ($rows as $row) {
		echo "<option value='" . $row["bid"] . "'>" . $row["brand_name"] . "</option>";
	}
	exit();
}
// category add
if (isset($_POST["catagory_name"]) and isset($_POST["parent_cat"])) {
	$obj = new DBOperation();
	$result = $obj->addcatagory($_POST["parent_cat"], $_POST["catagory_name"]);
	echo $result;
	exit();
}
// add brand
if (isset($_POST["brand_name"])) {
	$obj = new DBOperation();
	$result = $obj->addbrand($_POST["brand_name"]);
	echo $result;
	exit();
}
// add product
if (isset($_POST["added_date"]) and isset($_POST["product_name"])) {
	$obj = new DBOperation();
	$result = $obj->addproduct($_POST["select_cat"], $_POST["select_brand"], $_POST["product_name"], $_POST["product_price"], $_POST["product_qty"], $_POST["added_date"]);
	echo $result;
	exit();
}
// manage category
if (isset($_POST["manageCategory"])) {
	$obj = new Manage();
	$result = $obj->manageRecordWithPagination("catagories");
	$rows = $result["rows"];
	// $pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = 0;
		foreach ($rows as $row) {
			?>
			<tr>
				<td><?php echo ++$n; ?></td>
				<td><?php echo $row["category"]; ?></td>
				<td><?php echo $row["parent"]; ?></td>
				<!-- <td><a href="#" class="btn btn-success btn-sm"> Active</a></td> -->
				<td>
					<a href="#" did="<?php echo $row["cid"]; ?>" class="btn btn-danger btn-sm del_cat"> Delete</a>
					<a href="#" eid="<?php echo $row["cid"]; ?>" data-toggle="modal" data-target="#form_category" class="btn btn-primary btn-sm edit_cat"> Edit</a>
				</td>
			</tr>
		<?php

				}
			}
			exit();
		}



		// delete catagory
		if (isset($_POST["deleteCategory"])) {
			$m = new Manage();
			$result = $m->deleteRecord("catagories", "cid", $_POST["id"]);
			echo $result;
			exit();
		}

		// update catagory
		if (isset($_POST["updateCategory"])) {
			$m = new Manage();
			$result  = $m->getSingleRecord("catagories", "cid", $_POST["id"]);
			echo json_encode($result);
			exit();
		}
		// update record after data
		if (isset($_POST["update_catagory"])) {
			$m = new Manage();
			$id  = $_POST["cid"];
			$name = $_POST["update_catagory"];
			$parent = $_POST["parent_cat"];
			$result = $m->update_record("catagories", ["cid" => $id], ["parent_cat" => $parent, "catagory_name" => $name, "status" => 1]);
			echo $result;
		}

		// manage brand
		if (isset($_POST["manageBrand"])) {
			$obj = new Manage();
			$result = $obj->manageRecordWithPagination("brands");
			$rows = $result["rows"];
			// $pagination = $result["pagination"];
			if (count($rows) > 0) {
				$n = 0;
				foreach ($rows as $row) {
					?>
			<tr>
				<td><?php echo ++$n; ?></td>
				<td><?php echo $row["brand_name"]; ?></td>
				<td><a href="#" class="btn btn-success btn-sm"> Active</a></td>

				<td>
					<a href="#" did="<?php echo $row["bid"]; ?>" class="btn btn-danger btn-sm del_brand"> Delete</a>
					<a href="#" eid="<?php echo $row["bid"]; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-primary btn-sm edit_brand"> Edit</a>
				</td>
			</tr>
		<?php

				}
			}

			exit();
		}

		// delete brand

		if (isset($_POST["deleteBrand"])) {
			$m = new Manage();
			$result = $m->deleteRecord("brands", "bid", $_POST["id"]);
			echo $result;
			exit();
		}
		// update Brand
		if (isset($_POST["updateBrand"])) {
			$m = new Manage();
			$result  = $m->getSingleRecord("brands", "bid", $_POST["id"]);
			echo json_encode($result);
			exit();
		}
		// update record after data
		if (isset($_POST["update_brand"])) {
			$m = new Manage();
			$id  = $_POST["bid"];
			$name = $_POST["update_brand"];

			$result = $m->update_record("brands", ["bid" => $id], ["brand_name" => $name, "status" => 1]);
			echo $result;
		}


		// manage product


		if (isset($_POST["manageProduct"])) {
			$obj = new Manage();
			$result = $obj->manageRecordWithPagination("products");
			$rows = $result["rows"];
			// $pagination = $result["pagination"];
			if (count($rows) > 0) {
				$n = 0;
				foreach ($rows as $row) {
					?>
			<tr>
				<td><?php echo ++$n; ?></td>
				<td><?php echo $row["product_name"]; ?></td>
				<td><?php echo $row["catagory_name"]; ?></td>
				<td><?php echo $row["brand_name"]; ?></td>
				<td><?php echo $row["product_price"]; ?></td>
				<td><?php echo $row["product_stock"]; ?></td>
				<td><?php echo $row["added_date"]; ?></td>

				<?php if ($row["product_stock"] > 0) {
								?>
					<td><a href="#" class="btn btn-success btn-sm"> Active</a></td>
				<?php
							} else {
								?>
					<td><a href="#" class="btn btn-danger btn-sm"> Inactive</a></td>
				<?php
							}
							?>


				<td>
					<a href="#" did="<?php echo $row["pid"]; ?>" class="btn btn-danger btn-sm del_product"> Delete</a>
					<a href="#" eid="<?php echo $row["pid"]; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-primary btn-sm edit_product"> Edit</a>
				</td>
			</tr>
		<?php

				}
			}

			exit();
		}
		// manage sales
		if (isset($_POST["manageSales"])) {
			$obj = new Manage();

			$result = $obj->manageRecordWithPagination("invoice");
			$rows = $result["rows"];
			// $pagination = $result["pagination"];
			if (count($rows) > 0) {
				$n = 0;
				foreach ($rows as $row) {
					?>
			<tr>
				<td><?php echo ++$n; ?></td>
				<td><?php echo $row["invoice_no"]; ?></td>
				<td><?php echo $row["product_name"]; ?></td>
				<td><?php echo $row["qty"]; ?></td>
				<td><?php echo $row["customer_name"]; ?></td>
				<td><?php echo $row["net_total"]; ?></td>
				<td><?php echo $row["paid"]; ?></td>
				<td><?php echo $row["order_date"]; ?></td>

				<!-- <td><a href="#" class="btn btn-success btn-sm"> Active</a></td> -->
				<!-- <td>
					<!-- <a href="#" did="<?php echo $row["invoice_no"]; ?>" class="btn btn-danger btn-sm del_product"> Delete</a> -->
				</td> -->
			</tr>
	<?php

			}
		}

		exit();
	}

	// delete products

	if (isset($_POST["deleteProduct"])) {
		$m = new Manage();
		$result = $m->deleteRecord("products", "pid", $_POST["id"]);
		echo $result;
		exit();
	}

	// update product

	if (isset($_POST["updateProduct"])) {
		$m = new Manage();
		$result  = $m->getSingleRecord("products", "pid", $_POST["id"]);
		echo json_encode($result);
		exit();
	}
	// update record after data
	if (isset($_POST["update_product"])) {
		$m = new Manage();
		$id  = $_POST["pid"];
		$name = $_POST["update_product"];
		$cat = $_POST["select_cat"];
		$brand = $_POST["select_brand"];
		$price =  $_POST["product_price"];
		$stock =  $_POST["product_qty"];
		$date = $_POST["added_date"];
		$result = $m->update_record("products", ["pid" => $id], ["cid" => $cat, "bid" => $brand, "product_name" => $name, "product_price" => $price, "product_stock" => $stock, "added_date" => $date]);
		echo $result;
	}
	// update profile
	if (isset($_POST["updatePro"])) {
		$m = new Manage();
		$result  = $m->getSingleRecord("user", "id", $_POST["id"]);
		echo json_encode($result);
		exit();
	}
	if (isset($_POST["update_p_name"])) {
		$m = new Manage();
		$id  = $_SESSION["userid"];
		$name = $_POST["update_p_name"];
		$email = $_POST["update_p_email"];

		$result = $m->update_record("user", ["id" => $id], ["username" => $name, "email" => $email]);
		echo $result;
		exit();
	}


	// order process
	if (isset($_POST["getNewOrderItem"])) {
		$obj = new DBOperation();
		$rows = $obj->getAllRecord("products");
		?>
	<tr>
		<td><b class="number">1</b></td>
		<td>
			<select name="pid[]" class="form-control form-control-sm pid" required>
				<option value="">Choose Product</option>
				<?php
					foreach ($rows as $row) {
						?><option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option><?php
																														}
																														?>
			</select>
		</td>
		<td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
		<td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		<td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
			<!-- <td><input name="profit[]" type="text" class="form-control form-control-sm profit" readonly></span> -->
			<span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
		<td>Rs.<span class="amt"></span></td>

	</tr>
<?php
	exit();
}

// get price and quantity of one item
if (isset($_POST["getPriceAndQty"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products", "pid", $_POST["id"]);
	echo json_encode($result);
	exit();
}


// order taking process


if (isset($_POST["order_date"]) and isset($_POST["cust_name"])) {

	$orderdate = date("Y-m-d");
	$cust_name = $_POST["cust_name"];
	$phone = $_POST["phone"];


	//Now getting array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_pro_name = $_POST["pro_name"];
	// $ar_profit = $_POST["profit"];



	$sub_total = $_POST["sub_total"];
	$Revenue = $_POST["discount"];
	$profit = $_POST["t_profit"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];


	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$phone, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $Revenue, $net_total, $paid, $due, $payment_type, $profit);
}
// total sales
if (isset($_POST["manageTSales"])) {
	$obj = new Manage();
	$m = $obj->getSales();

	echo json_encode($m);
	exit();
}
// total profit
if (isset($_POST["manageTProfit"])) {
	$obj = new Manage();
	$m = $obj->getProfit();
	echo json_encode($m);
	exit();
}
// top product
if (isset($_POST["manageTPro"])) {
	$obj = new Manage();
	$m = $obj->getProduct();
	echo json_encode($m);
	exit();
}













?>