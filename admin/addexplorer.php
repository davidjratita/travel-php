 <?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$user_password=$_POST['password'];
$mobile=$_POST['phone'];
$address1=$_POST['city'];
$address2=$_POST['country'];

mysqli_query($con,"insert into user_info(first_name, last_name,email,password,mobile,address1,address2) values ('$first_name','$last_name','$email','$user_password','$mobile','$address1','$address2')") 
			or die ("Query 1 is inncorrect........");
header("location: manageexplorer.php"); 
mysqli_close($con);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14" style='background-color:transparent; box-shadow:none'>
              <div class="card" style='background-color:transparent; box-shadow:none'>
                <div class="card-header" style='background-color:transparent'>
                  <h4 class="card-title" style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;color:#9fac1e'>Add Explorers</h4>
  
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>First Name</label>
                          <input type="text" id="first_name" name="first_name" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Last Name</label>
                          <input type="text" name="last_name" id="last_name"  style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Email</label>
                          <input type="email" name="email" id="email" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Password</label>
                          <input type="password" id="password" name="password" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>phone number</label>
                          <input type="text" id="phone" name="phone" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Address</label>
                          <input type="text" name="country" id="country" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>City</label>
                          <input type="text" name="city" id="city"  style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                        </div>
                      </div>
                      
                      
                    </div>
                    
                    <button type="submit" name="btn_save" id="btn_save" class="pull-right" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px;color:#fff;border-radius:3px'>Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>