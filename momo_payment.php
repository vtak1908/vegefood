<?php
session_start();
$payment = $_SESSION['momo_payment'] ?? null;
if (!$payment || empty($payment['tongtien'])) die("Thiếu dữ liệu thanh toán");

$nguoiNhan = $payment['nguoiNhan'];
$sdt       = $payment['sdt'];
$diachi    = $payment['diachi'];
$tongTien  = (string)(int)$payment['tongtien'];

$endpoint    = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
$partnerCode = 'MOMO';
$accessKey   = 'F8BBA842ECF85';
$secretKey   = 'K951B6PE1waDMi640xX08PD3vg6EkVlz';
$orderId     = (string)time();
$requestId   = (string)time();
$returnUrl   = "https://localhost:8888/vegefood/momo_return.php";
$notifyUrl   = "https://localhost:8888/vegefood/notify.php";
$extraData   = "";
$requestType = "captureMoMoWallet";

$orderInfo = "Thanh toán cho $nguoiNhan ($sdt)";
$rawHash = "partnerCode=$partnerCode&accessKey=$accessKey&requestId=$requestId&amount=$tongTien&orderId=$orderId&orderInfo=$orderInfo&returnUrl=$returnUrl&notifyUrl=$notifyUrl&extraData=$extraData";
$signature = hash_hmac("sha256", $rawHash, $secretKey);

$data = [
    'partnerCode' => $partnerCode,
    'accessKey'   => $accessKey,
    'requestId'   => $requestId,
    'amount'      => $tongTien,
    'orderId'     => $orderId,
    'orderInfo'   => $orderInfo,
    'returnUrl'   => $returnUrl,
    'notifyUrl'   => $notifyUrl,
    'extraData'   => $extraData,
    'requestType' => $requestType,
    'signature'   => $signature
];

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
if (!empty($result['payUrl'])) {
    header("Location: " . $result['payUrl']);
    exit;
} else {
    echo "Giao dịch thất bại: " . ($result['localMessage'] ?? 'Không rõ lỗi');
}
