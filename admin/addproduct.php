  <?php
session_start();
include("../db.php");


if(isset($_POST['btn_save']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
mysqli_query($con,"insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_keywords) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$tags')") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}

mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">

         <div class="col-md-14" style='background-color:transparent; box-shadow:none'>
            <div class="card" style='background-color:transparent; box-shadow:none'>
              <div class="card-header" style='background-color:transparent'>
                <h5 class="title" style='padding:0px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;color:#9fac1e'>Add Market Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Product Title</label>
                        <input type="text" id="product_name" required name="product_name" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                    </div>
                    <br>
                    <div class="col-md-4">
                      <br>
                      <div class="">
                        <label for="" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Add Image</label>
                        <input type="file" name="picture" required id="picture" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                    </div>
                    <br>
                     <div class="col-md-12">
                      <br>
                      <div class="form-group">
                        <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <br>
                      <div class="form-group">
                        <label style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;' >Pricing</label>
                        <input type="text" id="price" name="price" required style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#ffffff20; margin-top:15px; box-shadow:none; border:0px solid #ffffff30; padding:10px; color:#fff;'>
                      </div>
                      <br>
                      <button type="submit" id="btn_save" name="btn_save" class="pull-right"  required style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px solid; color:#fff;border-radius:3px'>Save</button>
                      
                    </div>
                  </div>
              </div>
            </div>
          </div>
         </form>
        </div>
      </div>
      <?php
include "footer.php";
?>