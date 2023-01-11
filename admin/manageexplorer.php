
    <?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($con,"delete from user_info where user_id='$user_id'")or die("query is incorrect...");
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14" style='background-color:#002330'>
            <div class="card " style='background-color:#ffffff25'>
              <div class="card-header" style='background-color:#00000050'>
                <h4 class="card-title" style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>Manage User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-bordered" id="">
                    <thead class=" text-primary">
                      <tr>
                        <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>User Name</th>
                        <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'>User Password</th>
	                      <th style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#9fac1e'><a href="addexplorer.php" style='font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; background-color:#9fac1e; padding:10px 34px;border:0px;color:#fff;border-radius:3px'>Add New user</a>
                      </th>
                      </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select user_id, email, password from user_info")or die ("query 2 incorrect.......");

                        while(list($user_id,$user_name,$user_password)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr style='padding:0px;font-size: 16px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500;'>
                        <td>$user_name</td>
                        <td>$user_password</td>";

                        echo"<td>
                        <a href='editexplorer.php?user_id=$user_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                                <i style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#ffffff'>edit</i>
                              <div class='ripple-container'></div></a>
                              
                        <a href='manageexplorer.php?user_id=$user_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i style='padding:10px;font-size: 18px;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 500; color:#ff0050'>Delete</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
                        }
                        mysqli_close($con);
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