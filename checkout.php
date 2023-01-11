<?php
include "db.php";

include "header.php";


                         
?>

<style>

.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row-checkout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

	<main class="main">
		<!-- promo start-->
		<section class="promo-primary main_section">
			<picture>
				<source srcset="img/elements.jpg" media="(min-width: 992px)"/>
			<img class="img--bg" src="img/elements.jpg" alt="img"/>
			</picture>
			<div class="container">
				<div class="row">
					<div class="col-xl-6">
						<div class="align-container">
							<div class="align-container__item">
						<span class="promo-primary__pre-title">Rural Explorers'</span>
								<h1 class="promo-primary__title"><span>Process your cart payments</span><br></h1>
						<!-- <p class="text-white max-pt-30">For every purchase you make, you enable local businesses to thrive, children are able to
							access education, health care is reachable and a good standard of living is sustainable.
						</p>
						<a class="info-block__button button button--primary" href="#">Open Shop</a>
						<a href="#" class="link ml-15 text-white"><span>Learn more</span></a> -->
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- promo end-->
		<div class="container-fluid" style='margin-top:20px;margin-bottom:20px'>
				<div class="row-checkout">
				<?php
				if(isset($_SESSION["uid"])){
					$sql = "SELECT * FROM user_info WHERE user_id='$_SESSION[uid]'";
					$query = mysqli_query($con,$sql);
					$row=mysqli_fetch_array($query);
				
				echo'
					<div class="col-75">
						<div class="container-checkout" style="border:none">
						<form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">

						<div class="row-checkout">
						
						<div class="col-50" style="font-weight:600">
							<h5>Billing Address</h5>

							<label for="fname" ><i class="fa fa-user"></i> Full Name</label>
							<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="'.$row["first_name"].' '.$row["last_name"].'" style="font-weight:600;border:none">

							<label for="email"><i class="fa fa-envelope"></i> Email</label>
							<input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="'.$row["email"].'" required style="font-weight:600;border:none">

							<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
							<input type="text" id="adr" name="address" class="form-control" value="'.$row["address1"].'" required style="font-weight:600;border:none">

							<label for="city"><i class="fa fa-institution"></i> City</label>
							<input type="text" id="city" name="city" class="form-control" value="'.$row["address2"].'" pattern="^[a-zA-Z ]+$" required style="font-weight:600;border:none">

							<div class="row">
							<div class="col-50" style="font-weight:600">

								<label for="state">State</label>
								<input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required style="font-weight:600;border:none">

							</div>

							<div class="col-50" style="font-weight:600">
								<label for="zip">Zip</label>
								<input type="text" id="zip" name="zip" class="form-control" pattern="^[0-9]{6}(?:-[0-9]{4})?$" required style="font-weight:600;border:none">
							</div>

							</div>
						</div>
							
							
						<div class="col-50" style="font-weight:600">
							<h5>Payment</h5>
							
							<label for="fname">Accepted Cards</label>
							<div class="icon-container">
							<i class="fa fa-cc-visa" style="color:navy;"></i>
							<i class="fa fa-cc-mastercard" style="color:orange;"></i>

						</div>
							
							
						<label for="cname">Name on Card</label>
						<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required style="font-weight:600;border:none">
							
						<div class="form-group" id="card-number-field">
							<label for="cardNumber" style="font-weight:600">Card Number</label>
							<input type="text" class="form-control" id="cardNumber" name="cardNumber" required style="font-weight:600;border:none">
						</div>

						<label for="expdate">Exp Date</label>
						<input type="text" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="12/22"required>
							

						<div class="row">
						
							<div class="col-50" style="font-weight:600">
								<div class="form-group CVV">
									<label for="cvv" style="font-weight:600">CVV</label>
									<input type="text" class="form-control" name="cvv" id="cvv" required >
								</div>
							</div>
							<label style="font-weight:600">
							<input type="CHECKBOX" name="q" class="roomselect" value="conform" required> Shipping address same as billing
						</label>
						</div>

						

						</div>
						</div>';
						$i=1;
						$total=0;
						$total_count=$_POST['total_count'];
						while($i<=$total_count){
							$item_name_ = $_POST['item_name_'.$i];
							$amount_ = $_POST['amount_'.$i];
							$quantity_ = $_POST['quantity_'.$i];
							$total=$total+$amount_ ;
							$sql = "SELECT product_id FROM products WHERE product_title='$item_name_'";
							$query = mysqli_query($con,$sql);
							$row=mysqli_fetch_array($query);
							$product_id=$row["product_id"];
							echo "	
							<input type='hidden' name='prod_id_$i' value='$product_id'>
							<input type='hidden' name='prod_price_$i' value='$amount_'>
							<input type='hidden' name='prod_qty_$i' value='$quantity_'>
							";
							$i++;
						}
						
					echo'	
					<input type="hidden" name="total_count" value="'.$total_count.'">
						<input type="hidden" name="total_price" value="'.$total.'">
						
						<input type="submit" id="submit" value="PAY" class="checkout-btn">
					</form>
					</div>
					</div>
					';
				}else{
					echo"<script>window.location.href = 'index.php'</script>";
				}
				?>

					<div class="col-25">
						<div class="container-checkout" style="border:none">
						
						<?php
						if (isset($_POST["cmd"])) {
						
							$user_id = $_POST['custom'];
							
							
							$i=1;
							echo
							"
						<h5>Cart 
							<span class='price' style='color:black'>
							<i class='fa fa-shopping-cart' style='font-weight:600;color:#1db954'></i> 
							<b style='font-weight:600;color:#1db954'>$total_count</b>
							</span>
						</h5>

							<table class='table table-condensed'>
							
							<thead><tr>
								<th style='font-weight:600;color:#1db954'>No.</th>
								<th style='font-weight:600;color:#1db954'>Title</th>
								<th style='font-weight:600;color:#1db954'>Qty</th>
								<th style='font-weight:600;color:#1db954'>Amount</th></tr>
							</thead>
							<tbody>
							";
							$total=0;
							while($i<=$total_count){
								$item_name_ = $_POST['item_name_'.$i];
								
								$item_number_ = $_POST['item_number_'.$i];
								
								$amount_ = $_POST['amount_'.$i];
								
								$quantity_ = $_POST['quantity_'.$i];
								$total=$total+$amount_ ;
								$sql = "SELECT product_id FROM products WHERE product_title='$item_name_'";
								$query = mysqli_query($con,$sql);
								$row=mysqli_fetch_array($query);
								$product_id=$row["product_id"];
							
								echo "	

								<tr>
									<td style='font-weight:600'><p>$item_number_</p></td>
									<td style='font-weight:600'><p>$item_name_</p></td>
									<td style='font-weight:600'><p>$quantity_</p></td>
									<td style='font-weight:600'><p>$amount_</p></td>
								</tr>";
								
								$i++;
							}

						echo"

						</tbody>
						</table>
						<hr>
						
						<h5>total
							<span class='price' style='color:black'>
								<b style='color:#1db954'>UGX $total</b>
							</span>
						</h5>";
							
						}
						?>
						</div>
					</div>
				</div>
			</div>

		
	</main>
		
<?php
include "footer.php";
?>