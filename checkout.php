<?php
session_start();
            include("control.php");
          $get_data = new data_user();
if (isset($_SESSION['user'])) {
  $count = $get_data->count_Cart($_SESSION['user']);
}else{
  echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
    window.location = 'sign-in.php';</script>";
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
	          <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Thanh toán</span></p>
            <h1 class="mb-0 bread">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
            <form action="#" method="post" class="billing-form">
              <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
              <div class="row align-items-end">
                <div class="col-md-12">
                 <div class="form-group">
                    <label>Địa chỉ nhận hàng</label>
                    <select class="form-control" name="diachi" id="diachi">
                        <?php 
                        $select_add = $get_data->select_address($_SESSION['user']);
                        foreach($select_add as $se_add): ?>
                            <option value="<?php echo $se_add['id_address']; ?>" data-name="<?php echo $se_add['name_custommer']; ?>" data-phone="<?php echo $se_add['phone']; ?>" data-address="<?php echo $se_add['address']; ?>">
                                <?php echo $se_add['address']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Người nhận</label>
                    <input type="text" name="txtname" class="form-control" id="nguoiNhan" readonly>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="txtPhone" class="form-control" id="sdtNguoiNhan" readonly>
                </div>


                </div>
                <div class="w-100"></div>
                <div class="cart-detail p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                  <div class="form-group">
                    <div class="col-md-6">
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="Direct Bank Transfer" class="mr-2">Chuyển khoản qua ngân hàng</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6">
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="Thanh toán khi nhận hàng" class="mr-2"> Thanh toán khi nhận hàng</label>
                      </div>
                    </div>
                  </div>
				  <p><input type="submit" name="txtsub" value="Đặt hàng" class="btn btn-primary  py-3 px-4"></p>
                </div>
              </div>
            </form><!-- END -->

          </div>
          <div class="col-xl-5">
            <div class="row mt-5 pt-3">
              <div class="col-md-12 d-flex mb-5">
                <div class="cart-detail cart-total p-3 p-md-4">
					<?php 
					$select_cart = $get_data->select_Cart($_SESSION["user"]) ;
					?>
                  <h3 class="billing-heading mb-4">Tổng giỏ hàng</h3>
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
                            echo $formatted_price . ' ₫' ?></span>
                  </p>
				  <p class="d-flex total-price">
                  </p>
				  <br>
				  <br>
				  <h3 class="billing-heading mb-4">Mặt hàng</h3>
				  <?php
				  foreach($select_cart as $se): ?>
                  <p class="d-flex">
                    <span><img width="100px" height="100px" src="../Admin/upload/<?php echo $se['picture'] ?>" alt="<?php echo $se['name_pro'] ?>"></span>
                    <span><?php echo $se['name_pro'] ?><br>
				<span>Số lượng: <?php echo $se['quantity_order'] ?></span></span>
                  </p>
				  <hr>
				  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section>
	<?php 
		if(isset($_POST['txtsub'])){
			$name = $_POST['txtname'];
			$phone = $_POST['txtPhone'];
      $address = $_POST['diachi'];
			$pay = $_POST['optradio'];
			$status = "Chờ";
			$insert = $get_data->insert_Order($_SESSION['user'], $name,$phone, $address, $total, $pay,$status);
		if ($insert) {
			foreach ($select_cart as $se) {
				$insert_order = $get_data->insert_Order_Detail($insert, $se['id_pro'], $se['name_pro'], $se['quantity_order'], $se['total']);
			}
				if ($insert_order) {
					$delete = $get_data->delete_All_Cart($_SESSION['user']) ;
					echo "<script>alert('Đặt hàng thành công');
					window.location=(shop.php)</script>";
				}
		} else {
			echo "<script>alert('Vui lòng kiểm tra lại đơn đặt hàng')</script>";
		}
		}
	?>
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
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
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
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#F96D00"/></svg></div>

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
    <script src="js/main.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectDiachi = document.getElementById('diachi');
        var inputNguoiNhan = document.getElementById('nguoiNhan');
        var inputSdtNguoiNhan = document.getElementById('sdtNguoiNhan');

        // Hàm cập nhật giá trị của trường "Người nhận" và "Số điện thoại người nhận"
        function updateFields() {
            var selectedOption = selectDiachi.options[selectDiachi.selectedIndex];
            var name = selectedOption.getAttribute('data-name');
            var phone = selectedOption.getAttribute('data-phone');
            inputNguoiNhan.value = name;
            inputSdtNguoiNhan.value = phone;
        }

        // Cập nhật trường "Người nhận" và "Số điện thoại người nhận" khi trang được tải
        updateFields();

        // Cập nhật trường "Người nhận" và "Số điện thoại người nhận" khi lựa chọn thay đổi
        selectDiachi.addEventListener('change', updateFields);
    });
</script>


  </body>
</html>
