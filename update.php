<?php
require_once "./db_con.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE items SET `name` ='$name', `price` ='$price', `description` ='$description' WHERE id=$id";
    $result = mysqli_query($db_con, $sql);
    if ($result) {
        echo "successfully updated";
    } else {
        echo "something went wrong";
    }
}
