<?php

$connect = mysqli_connect("localhost", "root", "", "project_inv");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
 SELECT i.invoice_no,d.product_name,d.qty,i.customer_name,i.net_total,i.order_date,i.paid FROM invoice i, invoice_details d  WHERE d.invoice_no = i.invoice_no AND customer_name LIKE '%" . $search . "%'

 ";
} else {
    $query = "
  SELECT i.invoice_no,d.product_name,d.qty,i.customer_name,i.net_total,i.order_date,i.paid FROM invoice i, invoice_details d  WHERE d.invoice_no = i.invoice_no
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
                    <th>Invoice No</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Customer Name</th>
                    <th>Net Total</th>
                    <th>Paid</th>
                    <th>Order Date</th>

                </tr>
            </thead>
            <?php
                $n = 0;
                while ($row = mysqli_fetch_array($result)) {


                    ?>
                <tbody>
                    <tr>
                        <td><?php echo ++$n; ?></td>
                        <td><?php echo $row["invoice_no"]; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["qty"]; ?></td>
                        <td><?php echo $row["customer_name"]; ?></td>
                        <td><?php echo $row["net_total"]; ?></td>
                        <td><?php echo $row["paid"]; ?></td>
                        <td><?php echo $row["order_date"]; ?></td>



                       

            <?php

                }
                echo $output;
            } else {
                echo 'Data Not Found';
            }
            ?>
        </table>
    </div>