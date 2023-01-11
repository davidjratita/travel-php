 <?php
session_start();
include("../db.php");
error_reporting(0);

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../product_images/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14" style='background-color:#002330'>
            <div class="card" style='background-color:#ffffff25'>
              <div class="card-header" style='background-color:#00000050; padding-bottom:10px'>
                  <div class="row">
                      <h4 class="card-title" style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;color:#9fac1e'>Market Products</h4>

                      <a href="addproduct.php" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px;color:#fff;border-radius:3px; margin-left:10px'>Add New Market Products</a>
                  </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-bordered" id="page1">
                    <thead class=" text-primary">
                      <tr style='padding:0px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                        <th class='text-center' style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Image</th>
                        <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Name</th>
                        <th class='text-center' style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Price</th>
                        <th class='text-center' style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Action</th>
                    </tr>
                  </thead>

                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select product_id,product_image, product_title,product_price from products  where  product_id=2 or product_id=3 or product_id=4 Limit $page1,12")or die ("query 1 incorrect.....");

                        while(list($product_id,$image,$product_name,$price)=mysqli_fetch_array($result))
                        {
                        echo "<tr style='padding:0px;font-size: 16px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                        <td class='text-center'><img src='../product_images/$image' style='width:50px; height:50px; border-radius:0px'></td>
                        <td>$product_name</td>
                        <td class='text-center'>$price</td>
                        <td class='text-center'>

                        <a href='market.php?product_id=$product_id&action=delete' style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:transparent; padding:5px 34px;border:1px solid #ffffff70;color:#fff;border-radius:3px'>Delete</a>
                        </td></tr>";
                        }

                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>


            
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 

                //counting paging

                $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="market.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>