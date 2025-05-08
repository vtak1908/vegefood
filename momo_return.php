<?php
session_start();
include("control.php");
$get_data = new data_user();

$payment = $_SESSION['momo_payment'] ?? null;
if (!$payment || $_GET['errorCode'] != 0) {
    echo "Thanh toán thất bại hoặc bị huỷ";
    exit;
}

$name    = $payment['nguoiNhan'];
$sdt     = $payment['sdt'];
$diachi  = $payment['diachi'];
$total   = (int)$payment['tongtien'];
$pay     = "Thanh toán MoMo";
$status  = "Đã thanh toán";

if (isset($_SESSION['user'])) {
    $insert = $get_data->insert_Order($_SESSION['user'], $name, $sdt, $diachi, $total, $pay, $status);
    $cart   = $get_data->select_Cart($_SESSION['user']);
} else {
    $insert = $get_data->insert_Order(null, $name, $sdt, $diachi, $total, $pay, $status);
    $cart   = $_SESSION['cart'] ?? [];
}

if ($insert) {
    foreach ($cart as $item) {
        $get_data->insert_Order_Detail(
            $insert,
            $item['id_pro'],
            $item['name_pro'] ?? $item['name'],
            $item['quantity_order'] ?? $item['quantity'],
            $item['total']
        );
    }

    if (isset($_SESSION['user'])) {
        $get_data->delete_All_Cart($_SESSION['user']);
    } else {
        unset($_SESSION['cart']);
    }

    unset($_SESSION['momo_payment']);
    echo "<script>alert('Thanh toán MoMo thành công'); window.location='shop.php';</script>";
} else {
    echo "Lỗi khi lưu đơn hàng.";
}
