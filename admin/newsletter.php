
    <?php
session_start();
include("../db.php");

include "sidenav.php";
include "topheader.php";


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
?>
      <!-- End Navbar -->
      <div class="content" style='background-color:#002330'>
        <div >
          
         <div class="panel-body" style='background-color:#002330'>
		      <a>
            <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
            }?>
          </a>
        </div>

          <div class="col-md-14" style='background-color:#002330'>
            <div class="card" style='background-color:#ffffff25'>
              <div class="card-header" style='background-color:#00000050;'>
                <h4 class="card-title" style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;color:#9fac1e'>Newsletter Subscribers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-bordered" id="">

                    <thead >
                        <tr style='padding:0px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                          <th class='text-center' style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>ID</th> 
                          <th class='text-start' style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Emails</th>
                          
                          
                        </tr>
                  </thead>

                    <tbody>

                    <?php 
                        $result=mysqli_query($con,"select * from email_info")or die ("query 1 incorrect.....");

                        while(list($brand_id,$brand_title)=mysqli_fetch_array($result)) {
                        echo "<tr style='padding:10px;font-size: 16px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                        <td class='text-center'>$brand_id</td>
                        <td class='text-start'>$brand_title</td>";
                        }
                        ?>
                
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>