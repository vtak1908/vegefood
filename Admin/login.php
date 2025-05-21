<?php
session_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sign-in</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/slick.css"/>

        <link href="../css/tooplate-little-fashion.css" rel="stylesheet">
        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>


        <main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Đăng nhập</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post">

                                        <div class="form-floating mb-4 p-0">
                                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                                        </div>

                                        <button name="submit" type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Đăng nhập
                                        </button>


                                    </form>
                                </div>
                                <?php
                                    include("control.php");
                                    $get_Data = new data_user();
                                    if (isset($_POST['submit'])) {
                                        $select = $get_Data->login($_POST['username'], $_POST['password']);
                                        if (mysqli_num_rows($select) > 0) {
                                            echo "<script>alert('Đăng nhập thành công'); window.location=('index.php')</script>";
                                            $_SESSION['user'] = $_POST['username'];
                                        } else {
                                            echo "<script>alert('Đăng nhập thất bại')</script>";
                                        }
                                    }
                                    ?>

                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

    </body>
</html>
