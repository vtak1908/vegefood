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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Tin tức</span></p>
            <h1 class="mb-0 bread">Tin tức</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<div class="row">
							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_1.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">30/7/2024</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
		                <p>Rau củ quả là một phần không thể thiếu trong chế độ ăn uống của con người. Chúng không chỉ cung cấp nhiều dưỡng chất cần thiết mà còn mang lại nhiều lợi ích cho sức khỏe. Trong bài viết này, chúng ta sẽ khám phá lý do tại sao rau củ quả lại quan trọng và những cách tốt nhất để tận dụng chúng trong chế độ ăn uống hàng ngày.</p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_2.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">30/7/2024</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
		                <p>Rau củ quả là một phần không thể thiếu trong chế độ ăn uống của con người. Chúng không chỉ cung cấp nhiều dưỡng chất cần thiết mà còn mang lại nhiều lợi ích cho sức khỏe. Trong bài viết này, chúng ta sẽ khám phá lý do tại sao rau củ quả lại quan trọng và những cách tốt nhất để tận dụng chúng trong chế độ ăn uống hàng ngày.</p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_3.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">30/7/2024</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
		                <p>Rau củ quả là một phần không thể thiếu trong chế độ ăn uống của con người. Chúng không chỉ cung cấp nhiều dưỡng chất cần thiết mà còn mang lại nhiều lợi ích cho sức khỏe. Trong bài viết này, chúng ta sẽ khám phá lý do tại sao rau củ quả lại quan trọng và những cách tốt nhất để tận dụng chúng trong chế độ ăn uống hàng ngày.</p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_4.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">30/7/2024</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
		                <p>Rau củ quả là một phần không thể thiếu trong chế độ ăn uống của con người. Chúng không chỉ cung cấp nhiều dưỡng chất cần thiết mà còn mang lại nhiều lợi ích cho sức khỏe. Trong bài viết này, chúng ta sẽ khám phá lý do tại sao rau củ quả lại quan trọng và những cách tốt nhất để tận dụng chúng trong chế độ ăn uống hàng ngày.</p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_5.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">30/7/2024</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
		                <p>Rau củ quả là một phần không thể thiếu trong chế độ ăn uống của con người. Chúng không chỉ cung cấp nhiều dưỡng chất cần thiết mà còn mang lại nhiều lợi ích cho sức khỏe. Trong bài viết này, chúng ta sẽ khám phá lý do tại sao rau củ quả lại quan trọng và những cách tốt nhất để tận dụng chúng trong chế độ ăn uống hàng ngày.</p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php" class="block-20" style="background-image: url('images/image_6.jpg');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">30/7/2024</a></div>
		                  <div><a href="#">Admin</a></div>
		                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
		                <p>Rau củ quả là một phần không thể thiếu trong chế độ ăn uống của con người. Chúng không chỉ cung cấp nhiều dưỡng chất cần thiết mà còn mang lại nhiều lợi ích cho sức khỏe. Trong bài viết này, chúng ta sẽ khám phá lý do tại sao rau củ quả lại quan trọng và những cách tốt nhất để tận dụng chúng trong chế độ ăn uống hàng ngày.</p>
		                <p><a href="blog-single.php" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
		              </div>
		            </div>
		          </div>
						</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Tìm Kiếm...">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3 class="heading">Danh Mục</h3>
              <ul class="categories">
                <li><a href="#">Rau củ <span>(12)</span></a></li>
                <li><a href="#">Hoa Quả <span>(22)</span></a></li>

                <li><a href="#">Các loại hạt <span>(42)</span></a></li>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Tin tức mới nhất</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> 30/7/2024</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> 30/7/2024</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="blog-single.php">Lợi ích và Tầm Quan Trọng của Rau Củ Quả trong Cuộc Sống Hằng Ngày</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> 30/7/2024</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

           

            

        </div>
      </div>
    </section> <!-- .section -->

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
    
  </body>
</html>