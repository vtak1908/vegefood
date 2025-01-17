<?php
$server = "sql306.infinityfree.com";
$user = "if0_36967704";
$pass = "Kiet19082003";
$database = "if0_36967704_vegefood";
$conn = mysqli_connect($server, $user, $pass, $database);


if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
mysqli_query($conn, 'set names "utf8"');
?>
