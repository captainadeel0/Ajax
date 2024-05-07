<?php
 include("db_con.php");

 $id = $_GET['id'];

 $sql = "DELETE FROM items WHERE id = $id";
 
 if (mysqli_query($db_con , $sql)) {

   echo "successfully deletes";
}

?>