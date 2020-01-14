<?php

$connect = mysqli_connect("localhost", "root", "", "project_inv");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM brands 
  WHERE brand_name LIKE '%" . $search . "%'

 ";
} else {
    $query = "
  SELECT * FROM brands ORDER BY bid
 ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {

    ?>
    <div class="table-responsive">
        <table class="table table-hover table bordered table-dark  ">
            <thead class="thead-light">
                <tr>
                    <th>NO:</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
                $n = 0;
                while ($row = mysqli_fetch_array($result)) {


                    ?>
                <tr>
                    <td><?php echo ++$n ?></td>
                    <td> <?php echo $row["brand_name"] ?></td>
                    <td>
                        <a href="#" did="<?php echo $row["bid"]; ?>" class="btn btn-danger btn-sm del_brand"> Delete</a>
                        <a href="#" eid="<?php echo $row["bid"]; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-primary btn-sm edit_brand"> Edit</a>
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
    