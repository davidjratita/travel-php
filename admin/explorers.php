
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
              <div class="card-header" style='background-color:#00000050; padding-bottom:10px'>
			<div class="row">
					<h4 class="card-title" style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;color:#9fac1e'>List of Explorers</h4>

					<a href="manageexplorer.php" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px;color:#fff;border-radius:3px;  margin-left:20px;'>Manage Explorers</a>
					<a href="addexplorer.php" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px;color:#fff;border-radius:3px; margin-left:10px'>Add New Explorers</a>
				</div>
		    </div>
		    
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-bordered" id="" style="margin-top:10px">

                    <thead >
                        <tr style='padding:0px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                          <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Name</th> 
                          <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Email</th>
                          <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Password</th>
                          <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Contact</th>
                          <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Address</th>
                          <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>City</th>
                        </tr>
                  </thead>

                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select * from user_info")or die ("query 1 incorrect.....");

                        while(list($user_id,$first_name,$last_name,$email,$password,$phone,$address1,$address2)=mysqli_fetch_array($result))
                        {	
                        echo "<tr style='padding:10px;font-size: 16px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                        <td>$first_name $last_name</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$phone</td>
                        <td>$address1</td>
                        <td>$address2</td>
                        </tr>";
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