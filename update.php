<?php
require_once "./db_con.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "UPDATE items SET `name`='$name' WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "successfully updated";
    } else {
        echo "something went wrong";
    }
}
