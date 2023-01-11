
    <?php
session_start();
include("../db.php");
$user_id=$_REQUEST['user_id'];

$result=mysqli_query($con,"select user_id,first_name,last_name, email, password from user_info where user_id='$user_id'")or die ("query 1 incorrect.......");

list($user_id,$first_name,$last_name,$email,$user_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$user_password=$_POST['password'];

mysqli_query($con,"update user_info set first_name='$first_name', last_name='$last_name', email='$email', password='$user_password' where user_id='$user_id'")or die("Query 2 is inncorrect..........");

header("location: manageexplorer.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-14" style='background-color:transparent; box-shadow:none'>
            <div class="card" style='background-color:transparent; box-shadow:none'>
              <div class="card-header" style='background-color:transparent;'>
                <h5 class="title" style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;color:#9fac1e'>Edit Explorers</h5>
              </div>
              <form action="editexplorer.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>First name</label>
                        <input type="text" id="first_name" name="first_name"  value="<?php echo $first_name; ?>" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Last name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Email address</label>
                        <input type="email"  id="email" name="email" value="<?php echo $email; ?>" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Password</label>
                        <input type="text" name="password" id="password" value="<?php echo $user_password; ?>" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                      <button type="submit" id="btn_save" name="btn_save" class="pull-right" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px;color:#fff;border-radius:3px'>Update</button>
                    </div> 
                  </div>
              
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>