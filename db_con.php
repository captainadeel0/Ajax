<?php

// database connection
$db_con = mysqli_connect("localhost", "root", "", "ajax");
if (!$db_con) {
    die("database not connected");
}