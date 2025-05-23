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
$status  = "Đang chuẩn bị";

if (isset($_SESSION['user'])) {
    $insert = $get_data->insert_Order($_SESSION['user'], $name, $sdt, $diachi, $total, $pay, $status);
    $cart   = $get_data->select_Cart($_SESSION['user']);
} else {
    $insert = $get_data->insert_Order(null, $name, $sdt, $diachi, $total, $pay, $status);
    $cart   = $_SESSION['cart'] ?? [];
}

$transId = $_GET['transId'] ?? null; // Lấy transactionId từ MoMo trả về

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

    // Cập nhật momo_trans_id vào đơn hàng
    if ($transId) {
        $get_data->update_momo_trans_id($insert, $transId); // Bạn cần tạo hàm này trong class data_user
    }

    if (isset($_SESSION['user'])) {
        $get_data->delete_All_Cart($_SESSION['user']);
    } else {
        unset($_SESSION['cart']);
    }

    unset($_SESSION['momo_payment']);
    header("Location: invoice.php?order_id=$insert");
    exit;
} else {
    echo "Lỗi khi lưu đơn hàng.";
}