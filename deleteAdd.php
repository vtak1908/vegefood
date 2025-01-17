<?php
include('control.php');
session_start();
$get_data=new data_user();
echo $_GET['user'];
if (isset($_SESSION['user']) && isset($_GET['del'])) {
    $user = $_SESSION['user'];
    $id = $_GET['del'];

    // Check if the delete operation is successful
    if ($get_data->delete_add_id($user, $id)) {
        header('Location: taikhoan.php?address'); // Redirection on success
        exit();
    } else {
        echo "Error: Unable to delete the address.";
    }
} else {
    echo "Invalid request.";
}
?>
