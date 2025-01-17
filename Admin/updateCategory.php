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
    <title>Datatables - Kaiadmin Bootstrap 5 Admin Dashboard</title>
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
                  data-bs-toggle="collapse"
                  href="index.php"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
                    <li class="nav-item">
                      <a href="Product.php">
                        <i class="icon-book-open"></i>
                        <span class="sub-item">Product</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Category.php">
                        <i class="icon-menu"></i>
                        <span class="sub-item">Category</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Contact.php">
                        <i class="icon-envelope"></i>
                        <span class="sub-item">Contact</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Order.php">
                        <i class="icon-calendar"></i>
                        <span class="sub-item">Order</span>
                        
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="Report.php">
                        <i class="icon-chart"></i>
                        <span class="sub-item">Report</span>
                        
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
                        <a class="dropdown-item" href="logout.php">Logout</a>
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
                    <div class="card-title">Update Product</div>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id_cat'])) {
                        $id_cat = $_GET['id_cat'];
                        $select_cat_id = $get_data->select_cat_id($id_cat);
                        if ($select_cat_id) {
                            foreach ($select_cat_id as $se_cat) { ?>
                                <div class="row">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" value="<?php echo $se_cat['name_cat']; ?>" class="form-control" name="txtname" placeholder="" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="3" name="txtdes" required><?php echo $se_cat['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" name="txtsub" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="closeButton">Close</button>
                                        </div>
                                    </form>
                                </div>
                            <?php }
                        } else {
                            echo "Category not found.";
                        }
                    } else {
                        echo "Category ID is not defined.";
                    }

                    if (isset($_POST['txtsub'])) {
                        $update = $get_data->update_cat(
                            $id_cat,
                            $_POST['txtname'],
                            $_POST['txtdes']
                        );

                        if ($update) {
                            echo "<script>alert('Cập nhật phân loại thành công'); window.location=('Category.php');</script>";
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