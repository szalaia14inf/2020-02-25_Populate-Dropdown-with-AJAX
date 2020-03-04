<?php

include_once "config.php";

$id = $_POST['id'];

$sql = "SELECT id,code FROM gyártó WHERE code=".$id;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $code = $row['code'];

    $users_arr[] = array("id" => $id, "code" => $code);
}

echo json_encode($users_arr);

?>