<?php
$data = json_decode(file_get_contents("php://input"), true);

file_put_contents("momo_logs.txt", date('Y-m-d H:i:s') . "\n" . print_r($data, true) . "\n\n", FILE_APPEND);

// Ở đây bạn nên check signature, cập nhật trạng thái đơn hàng nếu cần
echo json_encode(['message' => 'Notify received']);
