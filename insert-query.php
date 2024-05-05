<?php

include("db_con.php");


$name = $_POST['item_name'];
$price = $_POST['item_price'];
$description = $_POST['item_description'];

$qry = "INSERT INTO items (`name`, `price`, `description`) 
VALUES ('$name','$price', '$description')";

if (mysqli_query($db_con, $qry)) {
    echo "Data inserted successfully....!";
} else {
    echo "Data is not inserted ....!";
}
