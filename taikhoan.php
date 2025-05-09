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
error_reporting(E_ALL);
ini_set('display_errors', 1);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
       <style>
      table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
      }
      table thead th {
        background-color: #f2f2f2;
        padding: 10px;
        border: 1px solid #ddd;
      }
      table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
      }
      table tbody tr:hover {
        background-color: #f1f1f1;
      }
      table tbody td {
        padding: 10px;
        border: 1px solid #ddd;
      }
      table th, table td {
        text-align: center;
      }
      .btn-primary {
        background-color: #82ae46;
        border-color: #82ae46;
      }
      .btn-primary:hover {
        background-color: #6d8f39;
        border-color: #6d8f39;
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
              <a class="nav-link dropdown-toggle active" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span></p>
            <h1 style="font-family:Arial, Helvetica, sans-serif; color:white; font-size:60px;">Tài khoản của bạn</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-4 p-md-5 justify-content-center align-items-center">
                        <h2>Tài khoản</h2>
						<ul>
                        <li><a href="taikhoan.php?account">Thông tin tài khoản</a></li>
                        <li><a href="taikhoan.php?address">Danh sách địa chỉ</a></li>
                    </ul>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
             <?php
             if (isset($_GET['address'])) {
               if (isset($_GET['insert'])) { ?>
                <div class="page-inner">
                  <h3 class="mb-4 billing-heading">Thông tin nhận hàng</h3>
                  <form action="#" method="post" class="billing-form">
                      <div class="row align-items-end">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="firstname">Tên</label>
                                  <input type="text" class="form-control" name="txtFName" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="lastname">Họ</label>
                                  <input type="text" class="form-control" name="txtLName" required>
                              </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="streetaddress">Tên đường, số nhà</label>
                                  <input type="text" name="txtAdd1" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="address">Quận/Huyện</label>
                                  <input name="txtAdd2" type="text" class="form-control" required>
                              </div>
                          </div>
                          <div class="w-100"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="towncity">Thành phố/Tỉnh</label>
                                  <input name="txtAdd3" type="text" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="phone">Số điện thoại</label>
                                  <input type="text" name="txtPhone" class="form-control" required>
                              </div>
                          </div>
                          <p><input type="submit" name="txtsub" value="Thêm địa chỉ" class="btn btn-primary py-3 px-4"></p>
                      </div>
                  </form>
              </div>
               <?php
                if(isset($_POST['txtsub'])){
                  $name = $_POST['txtLName'] . ' ' . $_POST['txtFName'];
                  $address = $_POST['txtAdd1'] . ', ' . $_POST['txtAdd2'] . ', ' . $_POST['txtAdd3'];
                  $phone = $_POST['txtPhone'];
                  $user_id = $_SESSION['user'];
                  $insert_add = $get_data->insert_address($user_id,$name,$phone, $address);
                  if($insert_add){
                      echo "<script>alert('Thêm địa chỉ thành công'); window.location='taikhoan.php?address';</script>";
                  } else {
                      echo "<script>alert('Vui lòng kiểm tra lại thông tin');</script>";
                  }
              }
	           } else {
                 $select_add = $get_data->select_address($_SESSION['user']) ?>
                <div class="pb-md-5">
                  <table style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th colspan="2" style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($select_add as $se_add): ?>
                        <tr>
                            <td><?php echo $se_add['name_custommer'] ?></td>
                            <td><?php echo $se_add['phone'] ?></td>
                            <td><?php echo $se_add['address'] ?></td>
                          
                                  <td><a href="updateAdd.php?id_add=<?php echo $se_add['id_address'] ?>" >Cập nhật</a></td>
                                 <td><a style="color: red;" href="deleteAdd.php?del=<?php echo $se_add['id_address'] ?>" >Xóa</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="pb-md-5">
                  <a href="taikhoan.php?address&insert">Thêm địa chỉ</a>
                </div>
             <?php }
             } else { ?>
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h3>Thông tin tài khoản</h3>
	            </div>
	          </div>
	          <div class="pb-md-5">
                <?php
                $select = $get_data->select_user($_SESSION['user']);
                foreach ($select as $se) { ?>
	          	<p><strong>Tên tài khoản: </strong><?php echo $se['username']; ?></p>
                    <p><strong>Số điện thoại: </strong><?php echo $se['phone']; ?></p>
                    <p><strong>Email: </strong><?php echo $se['email']; ?></p>
                    <?php } ?>
						</div>
            <div class="pb-md-12">
    <h3>Danh sách đơn hàng</h3>
    <table>
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Thành tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $donhang = $get_data->select_order($_SESSION['user']);
        foreach ($donhang as $order): ?>
            <tr>
                <td><a href="invoice.php?order_id=<?= $order['id_order'] ?>">#<?= $order['id_order'] ?></a></td>
                <td><?= $order['date'] ?></td>
                <td><?= number_format($order['total_order'], 0, ',', '.') ?> ₫</td>
                <td><?= $order['payment'] ?></td>
                <td><?= $order['status'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

            <?php  } ?>
        </div>
					</div>
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