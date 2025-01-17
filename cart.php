<?php
session_start();
            include("control.php");
          $get_data = new data_user();
if (isset($_SESSION['user'])) {
  $count = $get_data->count_Cart($_SESSION['user']);
}else{
  if(isset($_SESSION['cart'])){
    $count = count($_SESSION['cart']);
  }else{
    $count = '0';
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Cửa hàng</a>
              	<a class="dropdown-item" href="wishlist.php">Danh sách yêu thích</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">Về chúng tôi</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Tin tức</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Liên hệ</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $count;?>]</a></li>
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
<?php

if(isset($_GET['del'])){
    $id_pro = $_GET['del'];
  if (isset($_SESSION['user'])) {
    $delete = $get_data->delete_Cart($id_pro, $_SESSION['user']);
  } else {
    $product = []; // Khởi tạo mảng $product trước khi sử dụng
    
    foreach($_SESSION['cart'] as $cart_Item){
        if($cart_Item['id_pro'] != $id_pro ){
                 $product[] = array(
                    'id_pro' => $cart_Item['id_pro'],
                    'name' => $cart_Item['name'],
                    'quantity' => $cart_Item['quantity'],
                    'picture' => $cart_Item['picture'],
                    'price' => $cart_Item['price'],
                    'total' => $cart_Item['price']*$cart_Item['quantity']
                );
        }
    }
    
    unset($_SESSION['cart']);
    
    $_SESSION['cart'] = $product;
  }
}
?>

<?php
if(isset($_GET['minus'])){
    $id_pro = $_GET['minus'];
  if (isset($_SESSION['user'])) {
    $select_cart_item = $get_data->select_cart_item($id_pro, $_SESSION['user']);
    foreach ($select_cart_item as $item) {
      $newQuantity = $item['quantity_order'] - 1;
      if ($newQuantity > 0) {
        $update = $get_data->update_cart_item($id_pro, $newQuantity, $item['price'] * $newQuantity, $_SESSION['user']);
      } else {
        $delete = $get_data->delete_Cart($id_pro, $_SESSION['user']);
      }
    }
  }else {
    $product = []; // Khởi tạo mảng $product trước khi sử dụng
    
    foreach($_SESSION['cart'] as $cart_Item){
        if($cart_Item['id_pro'] != $id_pro ){
                 $product[] = array(
                    'id_pro' => $cart_Item['id_pro'],
                    'name' => $cart_Item['name'],
                    'quantity' => $cart_Item['quantity'],
                    'picture' => $cart_Item['picture'],
                    'price' => $cart_Item['price'],
                    'total' => $cart_Item['price']*$cart_Item['quantity']
                );
        }
                else{
                  $newQuantity =$cart_Item['quantity']-1;
        if ($newQuantity > 0) {
          $product[] = array(
            'id_pro' => $cart_Item['id_pro'],
            'name' => $cart_Item['name'],
            'quantity' => $newQuantity,
            'picture' => $cart_Item['picture'],
            'price' => $cart_Item['price'],
            'total' => $cart_Item['price'] * $newQuantity
          );
        } else {
          echo "<script>window.location=('cart.php?id_pro=".$cart_Item['id_pro']."')</script";
        }
        }
    }
    
    unset($_SESSION['cart']);
    
    $_SESSION['cart'] = $product;
  }
}
if (isset($_GET['plus'])) {
  $id_pro = $_GET['plus'];
  if (isset($_SESSION['user'])) {
    $select_cart_item = $get_data->select_cart_item($id_pro, $_SESSION['user']);
    foreach ($select_cart_item as $item) {
      $newQuantity = $item['quantity_order'] + 1;
      $update = $get_data->update_cart_item($id_pro, $newQuantity, $item['price'] * $newQuantity, $_SESSION['user']);
    }
  }else {
    $product = []; // Khởi tạo mảng $product trước khi sử dụng
    
    foreach($_SESSION['cart'] as $cart_Item){
        if($cart_Item['id_pro'] != $id_pro){
                 $product[] = array(
                    'id_pro' => $cart_Item['id_pro'],
                    'name' => $cart_Item['name'],
                    'quantity' => $cart_Item['quantity'],
                    'picture' => $cart_Item['picture'],
                    'price' => $cart_Item['price'],
                    'total' => $cart_Item['price']*$cart_Item['quantity']
                );
        }
        else{
          $newQuantity =$cart_Item['quantity']+1;
                 $product[] = array(
                    'id_pro' => $cart_Item['id_pro'],
                    'name' => $cart_Item['name'],
                    'quantity' => $newQuantity,
                    'picture' => $cart_Item['picture'],
                    'price' => $cart_Item['price'],
                    'total' => $cart_Item['price']*($newQuantity)
                );
        }
    }
    
    // Xóa $_SESSION['cart'] hiện tại
    unset($_SESSION['cart']);
    
    // Cập nhật $_SESSION['cart'] với mảng $product mới
    $_SESSION['cart'] = $product;
  }
}
?>
<script>
    function saveToSession() {
        let selectedIds = [];
        let checkboxes = document.querySelectorAll('.quantity:checked');

        checkboxes.forEach(function(checkbox) {
            selectedIds.push(checkbox.value);
        });

        // Lưu vào session
        sessionStorage.setItem('selectedIds', JSON.stringify(selectedIds));

        // Chuyển đến trang checkout
        window.location.href = 'checkout.php';
    }
</script>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Giỏ hàng</span></p>
            <h1 class="mb-0 bread">Giỏ hàng</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Tên sản phẩm</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Thành tiền</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php
              if (isset($_SESSION['user'])) {
                $select_cart = $get_data->select_Cart($_SESSION['user']);
                if (mysqli_num_rows($select_cart)) {
                  foreach ($select_cart as $se_cart):
                    ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="cart.php?del=<?php echo $se_cart['id_pro'] ?>"><span class="bi bi-trash">x</span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image: url('../Admin/upload/<?php echo ($se_cart['picture']); ?>');"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $se_cart['name_pro'] ?></h3>
						        </td>
						        
						        <td class="price"><?php $price = $se_cart['price'];
                    $formatted_price = number_format($price, 0, ',', '.');
                    echo $formatted_price . ' ₫' ?></td>
						        
						        <td class="quantity">
						    <div class="d-flex align-items-center">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" data-action="minus"><a href="cart.php?minus=<?php echo $se_cart['id_pro'] ?>"><i class="ion-ios-remove"></i></a></button>
                            <input name="quantity[<?php echo $se_cart['id_pro']; ?>]" value="<?php echo $se_cart['quantity_order'] ?>" type="number" class="form-control input-number">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" data-action="plus"><a href="cart.php?plus=<?php echo $se_cart['id_pro'] ?>"><i class="ion-ios-add"></a></i></button>
                        </div>
					          </td>
						        
						        <td class="total"><?php $price = $se_cart['total'];
                    $formatted_price = number_format($price, 0, ',', '.');
                    echo $formatted_price . ' ₫' ?></td>
						      </tr><!-- END TR-->
									<?php
                  endforeach;
                }
              } else if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $se_cart):
                    ?>
						      <tr class="text-center">
						        <td class="product-remove"><a href="cart.php?del=<?php echo $se_cart['id_pro'] ?>"><span class="bi bi-trash">x</span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image: url('../Admin/upload/<?php echo ($se_cart['picture']); ?>');"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $se_cart['name'] ?></h3>
						        </td>
						        
						        <td class="price"><?php $price = $se_cart['price'];
                    $formatted_price = number_format($price, 0, ',', '.');
                    echo $formatted_price . ' ₫' ?></td>
						        
						        <td class="quantity">
						    <div class="d-flex align-items-center">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" data-action="minus"><a href="cart.php?minus=<?php echo $se_cart['id_pro'] ?>"><i class="ion-ios-remove"></i></a></button>
                            <input name="quantity[<?php echo $se_cart['id_pro']; ?>]" value="<?php echo $se_cart['quantity'] ?>" type="number" class="form-control input-number">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" data-action="plus"><a href="cart.php?plus=<?php echo $se_cart['id_pro'] ?>"><i class="ion-ios-add"></a></i></button>
                        </div>
					          </td>
						        
						        <td class="total"><?php $price = $se_cart['total'];
                    $formatted_price = number_format($price, 0, ',', '.');
                    echo $formatted_price . ' ₫' ?></td>
						      </tr><!-- END TR-->
									<?php
                  endforeach;
								}else{
                  echo 'Không có sản phẩm nào trong giỏ hàng';
                }
								?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
        <?php if(isset($_SESSION['user'])){
        if (mysqli_num_rows($select_cart) ) { ?>
    		<div class="row justify-content-end">

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng số giỏ hàng</h3>
    					<p class="d-flex">
    						<span>Tổng phụ</span>
    						<span><?php $subTotal = 0;
                 foreach($select_cart as $se_cart){
                  $subTotal =$subTotal + $se_cart['total'];
                } 
                $formatted_price = number_format($subTotal, 0, ',', '.'); 
                echo $formatted_price . ' ₫' ;  ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Vận chuyển</span>
    						<span><?php $Discount = 30000; 
                            $formatted_price = number_format($Discount, 0, ',', '.'); 
                            echo $formatted_price . ' ₫' ?></span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Tổng</span>
    						<span><?php $total = $subTotal + $Discount;
                 $formatted_price = number_format($total, 0, ',', '.'); 
                            echo $formatted_price . ' ₫'?></span>
    					</p>
    				</div>
    				<p><a href="checkout.php" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
    			</div>
    		</div>
        <?php }
        } else if (isset($_SESSION['cart'])) {
          ?>
        <div class="row justify-content-end">

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng số giỏ hàng</h3>
    					<p class="d-flex">
    						<span>Tổng phụ</span>
    						<span><?php $subTotal = 0;
                foreach ($_SESSION['cart'] as $se_cart) {
                  $subTotal = $subTotal + $se_cart['total'];
                }
                $formatted_price = number_format($subTotal, 0, ',', '.');
                echo $formatted_price . ' ₫'; ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Vận chuyển</span>
    						<span><?php $Discount = 30000;
                $formatted_price = number_format($Discount, 0, ',', '.');
                echo $formatted_price . ' ₫' ?></span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Tổng</span>
    						<span><?php $total = $subTotal + $Discount;
                $formatted_price = number_format($total, 0, ',', '.');
                echo $formatted_price . ' ₫' ?></span>
    					</p>
    				</div>
    				<p><a href="checkout.php" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
    			</div>
    		</div>
        <?php } ?>
			</div>
		</section>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Sản phẩm tươi sạch</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Danh mục</h2>
              <ul class="list-unstyled">
                <li><a href="shop.php" class="py-2 d-block">Cửa hàng</a></li>
                <li><a href="about.php" class="py-2 d-block">Về chúng tôi</a></li>
                <li><a href="blog.php" class="py-2 d-block">Tin tức</a></li>
                <li><a href="contact.php" class="py-2 d-block">Liên hệ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Hỗ trợ</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Thông tin vận chuyển</a></li>
	                <li><a href="#" class="py-2 d-block">Trả hàng &amp; Hoàn tiền</a></li>
	                <li><a href="#" class="py-2 d-block">Điểu khoản &amp; Quy định</a></li>
	                <li><a href="#" class="py-2 d-block">Chính sách bảo mật</a></li>
	              </ul>
	           
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Bạn có thắc mắc?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">218, Minh Khai, Hai Bà Trưng, Hà Nội</span></li>
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