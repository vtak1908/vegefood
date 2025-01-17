<?php
session_start();
include ("control.php");
$get_data = new data(); $get_user = new data_user();
if (empty($_SESSION['user'])) {
  echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
    window.location = 'sign-in.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Product</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
              <img
                src="assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a
                  href="index.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Trang chủ</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Quản lý</h4>
              </li>
                    <li class="nav-item">
                      <a href="Product.php">
                        <i class="icon-book-open"></i>
                        <span class="sub-item">Sản phẩm</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Category.php">
                        <i class="icon-menu"></i>
                        <span class="sub-item">Danh mục</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Contact.php">
                        <i class="icon-envelope"></i>
                        <span class="sub-item">Liên hệ</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Order.php">
                        <i class="icon-calendar"></i>
                        <span class="sub-item">Đơn đặt hàng</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Report.php">
                        <i class="icon-chart"></i>
                        <span class="sub-item">Báo cáo</span>
                        
                      </a>
                    </li>
                  
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="notifDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="fa fa-bell"></i>
                    <span class="notification"></span>
                  </a>
                </li>
                
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <?php if (isset($_SESSION['user'])) {
                    $select_admin = $get_user->select_admin($_SESSION['user']);
                    foreach ($select_admin as $se) { ?>
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?php echo $se['username'] ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4><?php echo $se['username'] ?></h4>
                            <p class="text-muted"><?php echo $se['email'] ?></p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                      </li>
                    </div>
                  </ul>
                  <?php }
                  }else{
                    ?>
                    <span class="fw-bold"><a href="login.php">Đăng nhập</a></span>
                  <?php } ?>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
        <div class="container">
          <div class="page-inner">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Cập nhật sản phẩm</div>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id_pro'])) {
                        $id_pro = $_GET['id_pro'];
                        $select_pro_id = $get_data->select_product_id($id_pro);
                        if ($select_pro_id) {
                            foreach ($select_pro_id as $se_pro) { ?>
                                <div class="row">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" value="<?php echo $se_pro['name_pro']; ?>" class="form-control" name="txtname" placeholder="Product Name" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Số lượng</label>
                                                <input name="txtnum" value="<?php echo $se_pro['quantity']; ?>" type="number" class="form-control" placeholder="kilogram" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Danh mục hàng</label>
                                                <select class="form-control" name="txtselect" required>
                                                    <?php
                                                    $select_cat = $get_data->select_cat();
                                                    foreach ($select_cat as $cat) { ?>
                                                        <option value="<?php echo $cat['name_cat']; ?>" <?php echo $se_pro['category'] == $cat['name_cat'] ? 'selected' : ''; ?>>
                                                            <?php echo $cat['name_cat']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Ảnh</label>
                                                <input name="txtpic" type="file" class="form-control" accept=".jpg, .jpeg, .png" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Thư viện ảnh</label>
                                                <input type="file" id="images" class="form-control" name="albumImages[]" accept=".jpg, .jpeg, .png" multiple>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Ngày nhập</label>
                                                <input value="<?php echo $se_pro['date']; ?>" class="form-control" type="date" name="txtdate" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Giá</label>
                                                <input value="<?php echo $se_pro['price']; ?>" class="form-control" type="number" name="txtprice" placeholder="VNĐ" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Giá khuyến mãi</label>
                                                <input value="<?php echo $se_pro['price_sale']; ?>" class="form-control" type="number" name="txtpricesale" placeholder="VNĐ">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea class="form-control" rows="3" name="txtdes" required><?php echo $se_pro['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" name="txtsub" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            <?php }
                        } else {
                            echo "Product not found.";
                        }
                    } else {
                        echo "Product ID is not defined.";
                    }

                    if (isset($_POST['txtsub'])) {
                        $price_sale = isset($_POST['txtpricesale']) && $_POST['txtpricesale'] > 0 ? $_POST['txtpricesale'] : "";
                        $update = $get_data->update_product(
                            $id_pro,
                            $_POST['txtname'],
                            $_POST['txtnum'],
                            $_FILES['txtpic']['name'],
                            $_POST['txtselect'],
                            $_POST['txtdate'],
                            $_POST['txtprice'],
                            $price_sale,
                            $_POST['txtdes']
                        );

                        if ($update) {
                            $mainImage = $_FILES['txtpic']['name'];

                            // Handle main product image upload
                            if (!move_uploaded_file($_FILES['txtpic']['tmp_name'], 'upload/' . $mainImage)) {
                                echo "Error uploading main image<br>";
                            }
                            $uploadDirectory = 'upload/';
                        $delete_img = $get_data->delete_image($_GET['id_pro']);
                            foreach ($_FILES['albumImages']['name'] as $key => $name) {
                                $tmpName = $_FILES['albumImages']['tmp_name'][$key];
                                $filePath = $uploadDirectory . basename($name);

                                // Insert image details into database with the correct product ID
                                $upload = $get_data->insert_image($id_pro, $name);

                                if (!move_uploaded_file($tmpName, $filePath)) {
                                    echo "Error uploading $name<br>";
                                }
                            }

                            echo "<script>alert('Cập nhật sản phẩm thành công'); window.location=('Product.php');</script>";
                        } else {
                            echo "<script>alert('Cập nhật thất bại')</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
    </div>
    </div>
    </body>
</html>