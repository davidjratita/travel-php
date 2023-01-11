<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";


if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE product_id=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
            
            $cat_name = $row["cat_title"];
			echo "
			    
				<div class='col-9 col-sm-6 col-md-4' >
				
					<div class='shop-item'>

						<div class='shop-item__img'><a class='shop-item__add'>
							
							<span>
								<button pid='$pro_id' id='product' style='background-color:transparent;clor:#fff'>
									add to cart
								</button>
							</span>

							</a><img class='img--contain' src='product_images/$pro_image' alt='img'/>

						</div>


					<div class='shop-item__details'>
						
						<h6 class='shop-item__name'>
							<a href='product.php?p=$pro_id'>$pro_title</a>
						</h6>

						<ul class='rating-list'>
							<li class='rating-list__item'><i class='fa fa-star' aria-hidden='true'></i>
							</li>
							<li class='rating-list__item'><i class='fa fa-star' aria-hidden='true'></i>
							</li>
							<li class='rating-list__item'><i class='fa fa-star' aria-hidden='true'></i>
							</li>
							<li class='rating-list__item'><i class='fa fa-star' aria-hidden='true'></i>
							</li>
							<li class='rating-list__item'><i class='fa fa-star' aria-hidden='true'></i>
							</li>
						</ul>

						<div class='shop-item__details-lower'><span class='shop-item__price'>UGX $pro_price</span></div>
					</div>
					
					</div>
				</div>
                        
			";
		}
	}
}

if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
            
            
		";
	}
}




	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					
				";
				exit();
			}
			
		}
		
		
		
		
	}


	//Count User cart item

	if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total_price=$total_price+$product_price;
				echo '
					
                    
                    <div class="product-widget">
					<div class="product-img">
						<img src="product_images/'.$product_image.'" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-name"><a href="#">'.$product_title.'</a></h3>
						<h4 class="product-price"><span class="qty">'.$n.'</span>'.$product_price.'</h4>
					</div>
					
				</div>'
                    
                    
                    ;
				
			}
            
            echo '<div class="cart-summary">
				    <small class="qty">'.$n.' Item(s) selected</small>
				    <h5>UGX'.$total_price.'</h5>
				</div>'
            ?>
				
				
			<?php
			
			exit();
		}
	}
	
    
    
    if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo '<div class="main ">
			<div class="table-responsive">
			<form method="post" action="login.php" style="width:100%">
			
			<table id="cart" class="table" id="">
    				<thead>
					<tr>
						<th style="width:10%" class="text-center">Product</th>
						<th style="width:5%">Price</th>
						<th style="width:5%">Quantity</th>
						<th style="width:5%" class="text-center">Subtotal</th>
						<th style="width:5%"></th>
					</tr>
				</thead>
				<br>
				
				<tbody>
                    ';
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'
                             
						<tr>
							<td data-th="Product" class="text-center">
							<img src="product_images/'.$product_image.'" style="height: 120px;width:auto; margin-bottom:10px;margin-top:10px"/>
							</td>


							<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
							<input type="hidden" name="" value="'.$cart_item_id.'"/>
							<td data-th="Price">
							<input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly" style="border:0px solid #00000060; padding:10px;background-color:#f5f5f5;"></td>

							<td data-th="Quantity">
								<input type="text" class="form-control qty" value="'.$qty.'" style="border:0px solid #00000060; padding:10px;background-color:#f5f5f5;">
							</td>

							<td data-th="Subtotal" class="text-center"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly" style="border:0px solid #00000060; padding:10px;background-color:#f5f5f5;"></td>
							
							<td class="actions" data-th="" class="text-center">
							<a href="#" class="btn btn-danger btn-sm remove" remove_id="'.$product_id.'"><i class="fa fa-trash-o"></i></a>							
							</td>
						</tr>
					
                            
                            ';
				}
				
				echo '</tbody>
				
				<tfoot style="margin-top:10px">
					
					<tr>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center" style="font-weight:800;font-size:22px">
							<b class="net_total" ></b>
						</td>
						<div id="issessionset"></div>

                        		<td>
						';
						if (!isset($_SESSION["uid"])) {
							echo '
					
							<a href="login.php" class="btn btn-success" style="font-weight:800;font-size:22px; background-color:#1db954;padding:10px;color:#fff">Proceed to Checkout <i class="fa fa-angle-right"></i></a>
						</td>
					</tr>
				</tfoot>
				
			</table>

			</div></div>';
                }else if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
			</form>
					
			<form action="checkout.php" method="post">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="business" value="shoppingcart@puneeth.com">
				<input type="hidden" name="upload" value="1">';
					
				$x=0;
				$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
				$query = mysqli_query($con,$sql);
				while($row=mysqli_fetch_array($query)){
					$x++;
					echo  	

						'<input type="hidden" name="total_count" value="'.$x.'">
						<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
						<input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
						<input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
						<input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
					}
					
				echo   
				'<input type="hidden" name="return" value="http://localhost/myfiles/public_html/payment_success.php"/>
				<input type="hidden" name="notify_url" value="http://localhost/myfiles/public_html/payment_success.php">
				<input type="hidden" name="cancel_return" value="http://localhost/myfiles/public_html/cancel.php"/>
				<input type="hidden" name="currency_code" value="USD"/>
				<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
				
				<input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn btn-success" value="Proceed to Checkout" style="border:0px; padding:10px; background-color:#1db954;color:#fff">
			</form></td>
									
			</tr>
			
			</tfoot>
									
		</table></div></div>    
								';
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>






