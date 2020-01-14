<?php
 class DBOperation{
     private $con;
     function __construct()
     {
      include_once("../database/db.php");
      $db = new database();
      $this->con =  $db->connect();   
     }

     public function addcatagory($parent,$cat)
     {
         $pre_stmt = $this->con->prepare("INSERT INTO `catagories`(`parent_cat`, `catagory_name`, `status`) VALUES (?,?,?)");
        $status = 1;
         $pre_stmt->bind_param("isi",$parent,$cat,$status);
         $result = $pre_stmt->execute() or die($this->con->error);
         if($result)
         {
             return "catagory_added";
         }
         else {
             return 0;
         }
     }
     public function getAllRecord($table)
     {
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = array();
        if($result-> num_rows > 0)
        {
            while( $row = $result->fetch_assoc())
            {
                $rows[] = $row;
            }
            return $rows;
        }
         return "No_data";
     }



    //  add brand
    public function addbrand($brand_name)
    {
        $pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`) VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si", $brand_name, $status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "brand_added";
        } else {
            return "Error_adding_brand";
        }
    }
    //  add product
    public function addproduct($cid, $bid , $pro_name , $price , $stock , $date )
    {
    $pre_stmt = $this->con->prepare("INSERT INTO `products`(`cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES (?,?,?,?,?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("iisdisi", $cid, $bid,$pro_name,$price,$stock,$date,$status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            return "Product_added";
        } else {
            return "Error_adding_Product";
        }
    }

 }
 //$ob = new DBOperation();
//  echo $ob->addcatagory(1,"Phone");
//echo "<pre>";
//print_r($ob->getAllRecord("catagories"));
     
 
 

?>