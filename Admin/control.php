<?php
    include("connect.php");
    class data_user{
    public function select_admin($user)
    {
        global $conn;
        $sql = "SELECT * FROM `user_admin` WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_user()
    {
        global $conn;
        $sql = "SELECT * FROM user";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_user_top()
    {
        global $conn;
        $sql = "SELECT * FROM `user` ORDER BY `user`.`id_user` DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function register($name, $pass, $add, $ava, $gen, $hob, $email)
    {
        global $conn;
        $sql = "INSERT INTO user (username, password, address, avatar, gender, hobby, email) 
                VALUES ('$name', '$pass', '$add', '$ava', '$gen', '$hob', '$email')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function login($user, $pass)
    {
        global $conn;
        $sql = " select * from user_admin where username='$user' and password='$pass'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    }
class data
{
    public function insert_cate($name_cat, $description)
    {
        global $conn;
        $sql = " INSERT INTO category(name_cat,description)
                            values ('$name_cat','$description')";
        $run = mysqli_query($conn, $sql);
        return $run;

    }
    public function select_contact(){
        global $conn;
        $sql = "SELECT * FROM contact";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_contact($id_con){
        global $conn;
        $sql = "DELETE FROM contact WHERE id_con = '$id_con'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_cat()
    {
        global $conn;
        $sql = "select * from category";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_cat_id($id)
    {
        global $conn;
        $sql = "select * from category where id_cat='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_cat($id, $name_cat, $description)
    {
        global $conn;
        $sql = "UPDATE category set name_cat='$name_cat' ,description ='$description' WHERE id_cat='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function delete_category($id)
    {
        global $conn;
        $sql = "delete from category where id_cat='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_product($name, $quantity, $pic, $cate, $date, $price,$price_sale, $description)
    {
        global $conn;
        if ($price_sale === null || $price_sale === "") {
            $sql = "INSERT INTO product(name_pro, quantity, image, category, date, price, price_sale, description)
                            values('$name','$quantity','$pic','$cate','$date','$price',null,'$description')";
        } else {
            $sql = "INSERT INTO product(name_pro, quantity, image, category, date, price, price_sale, description)
                            values('$name','$quantity','$pic','$cate','$date','$price','$price_sale','$description')";
        }
        $run = mysqli_query($conn, $sql);
        $lastInsertId = mysqli_insert_id($conn);
        return $lastInsertId;
    }
    public function select_product()
    {
        global $conn;
        $sql = "select * from product";
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
    function delete_product($id)
    {
        global $conn;
        $sql = "delete from product where id_pro='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_product($id, $name, $quantity, $image, $category, $date, $price,$price_sale, $description)
    {
        global $conn;
        if ($price_sale === null || $price_sale === "") {
            $sql = "update product set name_pro='$name', quantity='$quantity', image='$image', category='$category', date='$date', price='$price',price_sale=null, description='$description' where id_pro='$id'";
        }else{
            $sql = "update product set name_pro='$name', quantity='$quantity', image='$image', category='$category', date='$date', price='$price',price_sale='$price_sale', description='$description' where id_pro='$id'";
        }
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_image($id_pro, $path)
    {
        global $conn;
        $sql = "INSERT INTO image_library(id_pro, path) VALUES ('$id_pro','$path')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_image()
    {
        global $conn;
        $sql = "SELECT * FROM `image_library`";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_image($id_pro){
        global $conn;
        $sql = "DELETE FROM `image_library` WHERE id_pro = $id_pro";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_order(){
        global $conn;
        $sql = "SELECT * FROM order_pro";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function order_detail( $id_order ){
        global $conn;
        $sql = "SELECT * FROM order_detail WHERE id_order='$id_order'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function order_status($id_order, $status)
    {
        global $conn;
        $sql = "UPDATE order_pro SET status='$status' WHERE id_order='$id_order'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_sale(){
        global $conn;
        $sql = "SELECT * FROM `order_pro` WHERE status = N'Hoàn thành'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function revenue(){
        global $conn;
        $sql = "SELECT month(date) as month, SUM(total_order) as total 
                FROM order_pro 
                WHERE status = N'Hoàn thành' 
                GROUP BY month(date)";
        $run = mysqli_query($conn,$sql);
        return $run;
    }
}
?>