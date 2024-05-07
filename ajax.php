<?php
require_once "./db_con.php";

$q = ( isset($_GET['query']) && !empty($_GET['query'])) ? trim($_GET['query']) : null; 

$sql = "SELECT * FROM items ";

if($q !== null) {
    $sql .= " WHERE name LIKE '%".$q."%' ";
}

$result = mysqli_query($db_con, $sql);

$html = "<table class='table table-striped'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>ID</th>";
$html .= "<th>Name</th>";
$html .= "<th>Price</th>";
$html .= "<th>Description</th>";
$html .= "<th>Actions</th>";
$html .= "</tr>";
$html .= "</thead>";


$html .= "<tbody>";

while($row = mysqli_fetch_assoc($result)){
    $html .= "<tr>";
    $html .= "<td>$row[id]</td>";
    $html .= "<td>$row[name]</td>";
    $html .= "<td>$row[price]</td>";
    $html .= "<td>$row[description]</td>";
    $html .= "<td><button class='btn btn-warning btn-sm me-2 editBtn' data-id='$row[id]'>Edit</button><button class='btn btn-danger btn-sm delBtn' data-id='$row[id]'>Delete</button></td>";
    $html .= "</tr>";
}


$html .= "</tbody></table>";


echo $html;
exit;


