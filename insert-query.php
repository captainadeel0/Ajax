<?php

include("db_con.php");


if (isset($_POST['submit'])) {
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$qry = "INSERT INTO items (`name`, `price`, `description`) 
VALUES ('$name','$price', '$description')";

if (mysqli_query($db_con, $qry)) {
    echo "Data inserted successfully....!";
} else {
    echo "Data is not inserted ....!";
}
}