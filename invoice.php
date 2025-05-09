<?php

session_start();
include("control.php");
$get_data = new data_user();

// Kiểm tra nếu có thông tin đơn hàng
$orderId = $_GET['order_id'] ?? null;
if (!$orderId) {
    echo "Không tìm thấy thông tin hóa đơn.";
    exit;
}

// Lấy thông tin đơn hàng
$order = mysqli_fetch_assoc($get_data->select_order_by_id($orderId));
if (!$order) {
    echo "Không tìm thấy thông tin hóa đơn.";
    exit;
}

// Lấy chi tiết đơn hàng
$orderDetails = $get_data->select_order_details($orderId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .invoice-container {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header h1 {
            font-size: 2.5rem;
            color: #28a745;
        }
        .invoice-header p {
            font-size: 1rem;
            color: #6c757d;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="invoice-container">
            <div class="invoice-header">
                <h1>Hóa đơn</h1>
                <p>Cảm ơn bạn đã mua sắm tại Vegefoods!</p>
            </div>
            <hr>
            <h3>Thông tin khách hàng</h3>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Tên:</strong> <?= $order['name_customer'] ?></p>
                    <p><strong>Số điện thoại:</strong> <?= $order['phone'] ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Địa chỉ:</strong> <?= $order['address'] ?></p>
                    <p><strong>Phương thức thanh toán:</strong> <?= $order['payment'] ?></p>
                </div>
            </div>
            <p><strong>Trạng thái:</strong> <?= $order['status'] ?></p>
            <hr>
            <h3>Chi tiết đơn hàng</h3>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDetails as $item): ?>
                    <tr>
                        <td><?= $item['name_pro'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['total'] / $item['quantity'], 0, ',', '.') ?> ₫</td>
                        <td><?= number_format($item['total'], 0, ',', '.') ?> ₫</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h4 class="text-right">Tổng cộng: <?= number_format($order['total_order'], 0, ',', '.') ?> ₫</h4>
            <hr>
            <div class="text-center">
                <a href="shop.php" class="btn btn-primary">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
</body>
</html>