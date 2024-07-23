<?php
session_start();
            include("control.php");
          $get_data = new data_user();
if (isset($_SESSION['user'])) {
  $count = $get_data->count_Cart($_SESSION['user']);
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<style>
      .img-prod img {
    width: 100%;
    height: auto;
    object-fit: cover;
    aspect-ratio: 1/1; /* This will maintain a 1:1 aspect ratio */
}

.product {
    position: relative;
    overflow: hidden;
    width: 100%;
    max-width: 300px; /* Adjust this to your preferred maximum width */
    margin: auto;
}

.product .img-prod {
    width: 100%;
    height: 300px; /* Adjust this to your preferred height */
    display: flex;
    align-items: center;
    justify-content: center;
}

.product .img-prod img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Cửa hàng</a>
              	<a class="dropdown-item" href="wishlist.php">Danh sách yêu thích</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Tin tức</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Liên hệ</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if (isset($_SESSION["user"])) {
              echo $count;
            } else
              echo '0'; ?>]</a></li>
            <li class="nav-item dropdown">
              <?php if (isset($_SESSION["user"])) {
              ?>
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user'] ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="taikhoan.php">Thông tin tài khoản</a>
              	<a class="dropdown-item" href="logout.php">Đăng xuất</a>
              </div>
              <?php } else { ?>
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="sign-up.php">Đăng ký</a>
              	<a class="dropdown-item" href="sign-in.php">Đăng nhập</a>
              </div>
              <?php } ?>
            </li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Chi tiết sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <form method="post">
    	<section class="ftco-section">
	    	<div class="container">
	    		<div class="row">
					<?php
					$category = '';
					$select_id_pro = $get_data->select_product_id($_GET["id_pro"]);
					foreach($select_id_pro as $pro) {
						$additional_images = $get_data->get_additional_images($pro['id_pro']);
					?>
	    			<div class="col-lg-6 mb-5 ftco-animate">
                    <a id="main-image-link" href="../Admin/upload/<?php echo $pro['image'] ?>" class="image-popup">
                        <img id="main-image" class="img-fluid main-image" src="../Admin/upload/<?php echo $pro['image'] ?>" alt="<?php echo $pro['name_pro'] ?>">
                    </a>
                    <div class="additional-images mt-2 d-flex ">
                        <?php $category = $pro['category'];
						 foreach ($additional_images as $image) { ?>
                            <img src="../Admin/upload/<?php echo $image; ?>" alt="<?php echo $pro['name_pro'] ?>" class="img-thumbnail" style="width: 100px; height: 100px; margin-right: 5px;" onclick="swapImages(this);">
                        <?php } ?>
                    </div>
                </div>
	    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
	    				<h3><?php echo $pro['name_pro'] ?></h3>
	    				<div class="rating d-flex">
								<p class="text-left mr-4">
									<a href="#" class="mr-2">5.0</a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
									<a href="#"><span class="ion-ios-star-outline"></span></a>
								</p>
								<p class="text-left mr-4">
									<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
								</p>
								<p class="text-left">
									<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
								</p>
							</div>
	    				<p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="price-sale"><?php
                            $price_sale = $pro['price_sale']; 
                            $formatted_price = number_format($price_sale, 0, ',', '.'); 
                            echo $formatted_price . ' ₫';
							?></span><?php } else { ?><span class="price-sale"><?php $price_sale = $pro['price']; 
                            $formatted_price = number_format($price_sale, 0, ',', '.'); 
                            echo $formatted_price . ' ₫'; ?></span> <?php } ?></p>
	    				<p><?php echo $pro['description'] ?></p>
							<div class="row mt-4">
								<div class="col-md-6">
									<div class="form-group d-flex">
			            </div>
								</div>
								<div class="w-100"></div>
								<div class="input-group col-md-6 d-flex mb-3">
		             	<span class="input-group-btn mr-2">
		                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
		                   <i class="ion-ios-remove"></i>
		                	</button>
		            		</span>
		             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $pro['quantity']?>">
		             	<span class="input-group-btn ml-2">
		                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
		                     <i class="ion-ios-add"></i>
		                 </button>
		             	</span>
		          	</div>
		          	<div class="w-100"></div>
		          	<div class="col-md-12">
		          		<p style="color: #000;"><?php echo $pro['quantity']." kg available" ?></p>
		          	</div>
					<?php } ?>
	          	</div>
	          	<input class="btn btn-primary py-3 px-5" type="submit" name="txtsub" value="Add to Cart"></input>
	    			</div>
	    		</div>
	    	</div>
	    </section>
    </form>
	<?php
	if(isset($_POST['txtsub'])){
	if(empty($_SESSION['user'])){
    echo "<script>alert('Ban can dang nhap de thuc hien thao tac nay');
    window.location=('sign-in.php')</script>";
}else{
    if(empty($_POST['quantity'])){
        echo "<script>alert('Vui lòng nhập đủ thông tin');</script>";
    } else {
			foreach ($select_id_pro as $se) {
				if ($_POST['quantity'] < 1 || $_POST['quantity'] > $se['quantity']) {
					echo "<script>alert('Số lượng không phù hợp');</script>";
				} else {
					$id_pro = $_GET['id_pro'];
					$quantity = $_POST['quantity'];
					$update = $get_data->update_quantity_pro( $se['id_pro'], $se['quantity'] - $quantity);
					$select_cart = $get_data->select_cart( $_SESSION['user']);
					$found = false;
					foreach($select_cart as $cart_item){
					            if($cart_item['id_pro'] == $id_pro ){
					                $new_total= $cart_item['total'] + $quantity*$cart_item['price'];
									$found = true;
					                $updateResult = $get_data->update_cart_item($cart_item['id_pro'], $cart_item['quantity_order']+$quantity, $new_total,$_SESSION['user']);
					                echo "<script>window.location=('cart.php')</script>";
									break;
					            }
					        }
					        if(!$found){
					            $insertResult = $get_data->insert_Cart($_SESSION['user'], $se['id_pro'], $se['name_pro'],$price_sale, $se['image'], $quantity, $price_sale*$quantity);
					            echo "<script>window.location=('cart.php')</script>";
					        }
					    }
					}
				}
			}
		}
	 ?>
    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Sản phẩm</span>
            <h2 class="mb-4">Sản phẩm tương tự</h2>
            <p></p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php
				$select_cat = $get_data->select_product_cat( $category);
				$dem = 0;
				foreach ($select_cat as $pro) {
					$dem++;
					if ($dem == 5) {
						break;
					} else {
						?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>" class="img-prod"><img class="img-fluid" src="../Admin/upload/<?php echo $pro['image'] ?>  " alt="<?php echo $pro['name_pro'] ?>">
    					<p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="status"><?php echo (100 * ($pro['price'] - $pro['price_sale'])) / $pro['price'] ?>%</span>	<?php } ?>
              <div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>"><?php echo $pro['name_pro'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="mr-2 price-dc"><?php $price_sale = $pro['price'];
									   $formatted_price = number_format($price_sale, 0, ',', '.');
									   echo $formatted_price . ' ₫' ?></span> <span class="price-sale"><?php $price_sale = $pro['price_sale'];
										   $formatted_price = number_format($price_sale, 0, ',', '.');
										   echo $formatted_price . ' ₫' ?></span><?php } else { ?><span class="price-sale"><?php $price_sale = $pro['price'];
												  $formatted_price = number_format($price_sale, 0, ',', '.');
												  echo $formatted_price . ' ₫' ?></span> <?php } ?> </p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
                    &nbsp;
	    							<a href="wishlist.php?id_pro=<?php echo $pro['id_pro'] ?>" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
          <?php }
				} ?>
    		</div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <<li><span class="icon icon-map-marker"></span><span class="text">218, Minh Khai, Hai Bà Trưng, Hà Nội</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+0369852147</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">quan@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
<script>
function swapImages(thumb) {
    let mainImage = document.getElementById('main-image');
    let mainImageLink = document.getElementById('main-image-link');
    
    // Store current main image src
    let tempSrc = mainImage.src;
    
    // Update main image src to thumbnail src
    mainImage.src = thumb.src;
    
    // Update the href of the main image link to the new main image src
    mainImageLink.href = thumb.src;
    
    // Update the thumbnail src to the previous main image src
    thumb.src = tempSrc;
}
</script>
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>