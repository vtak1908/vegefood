<?php
    include("connect.php");
class data_user
{
    public function login($user, $pass)
    {
        global $conn;
        $sql = " select * from user where username='$user' and password='$pass'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_user($user)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_User($name, $pass, $email)
    {
        global $conn;
        $sql = "INSERT INTO user (username, password, email) 
                VALUES ('$name', '$pass','$email')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function count_Cart($user) {
        global $conn;
        $sql = "SELECT COUNT(*) AS total FROM cart WHERE username = '$user'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    
    public function insert_contact($name, $email, $phone, $mes)
    {
        global $conn;
        $sql = "INSERT INTO `contact`( `name`, `email`, `phone`, `messenger`) VALUES ('$name','$email','$phone','$mes')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_product()
    {
        global $conn;
        $sql = "select * from product";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_product_cat($category)
    {
        global $conn;
        $sql = "select * from product where category='$category'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_product_id($id)
    {
        global $conn;
        $sql = "select * from product where id_pro='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_additional_images($id_pro)
    {
        global $conn;
        $sql = "SELECT path FROM image_library WHERE id_pro = '$id_pro'";
        $result = mysqli_query($conn, $sql);
        $images = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $images[] = $row['path'];
            }
        }
        return $images;
    }
    public function update_quantity_pro($id_pro, $quantity)
    {
        global $conn;
        $sql = "UPDATE `product` SET `quantity`='$quantity' WHERE id_pro ='$id_pro'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_Cart($username){
        global $conn;
        $sql = "SELECT * FROM cart WHERE username='$username'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_Cart($user,$id_pro,$name,$price,$pic,$num,$total){
        global $conn;
        $sql = "INSERT INTO cart(`username`, `id_pro`, `name_pro`, `price`, `picture`, `quantity_order`, `total`) 
                VALUES ('$user','$id_pro','$name','$price','$pic', '$num', '$total')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_Cart($id_pro,$user){
        global $conn;
        $sql = "DELETE FROM cart WHERE id_pro = '$id_pro' and username='$user'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function delete_All_Cart($user){
        global $conn;
        $sql = "DELETE FROM cart where username='$user'";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
    public function get_cart_item($id,$size){
        global $conn;
        $sql = "SELECT * FROM cart where id_pro='$id' and size ='$size'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_cart_item($id_pro, $newQuantity,$total,$user){
        global $conn;
        $sql="update cart set quantity_order ='$newQuantity', total='$total' where id_pro='$id_pro' and username='$user'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function select_cart_item($id_pro,$username){
        global $conn;
         $sql = "SELECT * FROM cart WHERE username='$username' and id_pro='$id_pro'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_Order($username,$name,$phone,$add,$tatol,$pay,$status){
        global $conn;
        $sql = "INSERT INTO `order_pro`( `userName`,`name_customer`, `phone`, `address`, `total_order`, `payment`, `status`) 
            values('$username','$name','$phone','$add','$tatol','$pay','$status')";
        $run=mysqli_query($conn,$sql);
        $lastInsertId = mysqli_insert_id($conn);
        return $lastInsertId;
    }
    
    public function insert_Order_Detail($id_order, $id_pro, $name, $quantity, $total)
    {
        global $conn;
        $sql = "insert into order_detail(id_order,id_pro,name_pro,quantity,total) 
            values('$id_order','$id_pro','$name','$quantity','$total')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function selelect_wishList(){
        global $conn;
        $sql = "SELECT * FROM wish_list";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_wishList($id_pro,$image,$name,$price,){
        global $conn;
        $sql = "INSERT INTO `wish_list`(`id_pro`, `image`, `name_pro`, `price`)
         VALUES ('$id_pro','$image','$name','$price')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_wishList($id_pro){
        global $conn;
        $sql = "DELETE FROM  wish_list where id_pro = '$id_pro'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_address($user,$name,$phone,$address){
        global $conn;
        $sql = "INSERT INTO `address_cus`(`username`, `name_custommer`, `phone`, `address`) VALUES ('$user','$name','$phone','$address')";
        $run = mysqli_query($conn,$sql);
        return $run;
    } 
        
    public function select_address($user){
        global $conn;
        $sql = "SELECT * FROM address_cus WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_address($user,$id, $name, $phone,$address){
        global $conn;
        $sql = "UPDATE address_cus SET name='$name',phone='$phone',address='$address' WHERE id_address ='$id' AND username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_address($user, $id)
    {
        global $conn;
        $sql = "DELETE FROM address_cus WHERE username='$user' AND id_address='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_order($user){
        global $conn;
        $sql = "SELECT * FROM order_pro WHERE userName = '$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_add_id($user, $id)
    {
        global $conn;
        $sql = "SELECT * FROM address_cus WHERE username= '$user' and id_address='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_add_id($user, $id, $name, $phone, $address)
    {
        global $conn;
        $sql = "UPDATE address_cus SET name_custommer='$name', phone='$phone', address='$address' WHERE username= '$user' and id_address='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_add_id($user, $id){
        global $conn;
        $sql = "DELETE FROM address_cus WHERE username= '$user' and id_address='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function addToCart($user, $id_pro, $name, $price, $picture, $qty, $total) {
        global $conn;
        $sql = "INSERT INTO tbl_cart (username, id_pro, name_pro, price, picture, quantity_order, total)
                VALUES ('$user', '$id_pro', '$name', '$price', '$picture', '$qty', '$total')";
        return mysqli_query($conn, $sql);
    }
    
    
}
?>