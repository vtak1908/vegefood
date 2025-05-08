<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['momo_payment'] = [
        'nguoiNhan' => $_POST['nguoiNhan'] ?? '',
        'sdt'       => $_POST['sdt'] ?? '',
        'diachi'    => $_POST['diachi'] ?? '',
        'tongtien'  => $_POST['tongtien'] ?? ''
    ];

    header("Location: momo_payment.php");
    exit;
}
echo "Lỗi phương thức gửi.";
