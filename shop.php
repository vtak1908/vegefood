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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Sản phẩm</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    <?php
        $current_cat = isset($_GET['cat']) ? $_GET['cat'] : 'All';
    ?>
    <li><a href="shop.php" class="<?php echo $current_cat == 'All' ? 'active' : ''; ?>">Tất cả</a></li>
    <li><a href="shop.php?cat=Vegetables" class="<?php echo $current_cat == 'Vegetables' ? 'active' : ''; ?>">Rau củ</a></li>
    <li><a href="shop.php?cat=Fruits" class="<?php echo $current_cat == 'Fruits' ? 'active' : ''; ?>">Trái cây</a></li>
    <li><a href="shop.php?cat=Dried" class="<?php echo $current_cat == 'Dried' ? 'active' : ''; ?>">Các loại hạt</a></li>
</ul>
    			</div>
    		</div>
    		<div class="row">
          <?php 
          if (!isset($_GET["cat"])) {
            $select_pro = $get_data->select_product();
            foreach ($select_pro as $pro) {
              ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>" class="img-prod"><img  class="img-fluid" src="Admin/upload/<?php echo $pro['image'] ?>  " alt="<?php echo $pro['name_pro'] ?>">
    					<p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="status"><?php echo round((100 * ($pro['price'] - $pro['price_sale'])) / $pro['price']) ?>%</span>	<?php } ?>
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
          } else {
            $select_pro = $get_data->select_product_cat($_GET['cat']);
            foreach ($select_pro as $pro) {
              ?>
              <div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>" class="img-prod"><img class="img-fluid" src="Admin/upload/<?php echo $pro['image'] ?>  " alt="<?php echo $pro['name_pro'] ?>">
    					<p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="status"><?php echo round((100 * ($pro['price'] - $pro['price_sale'])) / $pro['price']) ?>%</span>	<?php } ?>
              <div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>"><?php echo $pro['name_pro'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><?php if (isset($pro['price_sale'])) { ?><span class="mr-2 price-dc"><?php $price_sale = $pro['price'];
                      $formatted_price = number_format($price_sale, 0, ',', '.');
                       echo $formatted_price . ' ₫'; ?></span> <span class="price-sale"><?php $price_sale = $pro['price_sale'];
                         $formatted_price = number_format($price_sale, 0, ',', '.');
                           echo $formatted_price . ' ₫'; ?></span><?php } else { ?><span class="price-sale"><?php $price_sale = $pro['price'];
                               $formatted_price = number_format($price_sale, 0, ',', '.');
                                  echo $formatted_price . ' ₫'; ?></span> <?php } ?> </p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="product-single.php?id_pro=<?php echo $pro['id_pro'] ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
                    &nbsp;
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
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
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">vukiet252@gmail.com</span></a></li>
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
    
  </body>
</html>