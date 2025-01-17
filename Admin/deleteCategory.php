<?php
include('control.php');
$get_data=new data();
$delete=$get_data->delete_category($_GET['del']); //Gọi function tương ứng với tham số là giá trị truyền trang
if($delete) header('location:Category.php');// nếu xóa thành công thì chuyển trang
else echo "not delete";
?>
