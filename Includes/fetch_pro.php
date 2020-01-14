<?php

$connect = mysqli_connect("localhost", "root", "", "project_inv");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT p.pid,p.product_name,c.catagory_name,b.brand_name,p.product_price,p.product_stock,p.added_date,p.p_status FROM products p,brands b,catagories c WHERE p.bid = b.bid AND p.cid = c.cid AND product_name LIKE '%" . $search . "%'

 ";
} else {
    $query = "
  SELECT p.pid,p.product_name,c.catagory_name,b.brand_name,p.product_price,p.product_stock,p.added_date,p.p_status FROM products p,brands b,catagories c WHERE p.bid = b.bid AND p.cid = c.cid
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {

    ?>
    <div class="table-responsive">
        <table class="table table-hover table bordered table-dark">
            <thead class="thead-light">
                <tr>
                    <th>NO:</th>
                    <th>Product</th>
                    <th>Catagory</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
                $n = 0;
                while ($row = mysqli_fetch_array($result)) {


                    ?>
                <tbody>
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
                echo $output;
            } else {
                echo 'Data Not Found';
            }
            ?>
        </table>
    </div>