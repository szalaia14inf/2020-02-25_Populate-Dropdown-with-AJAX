<?php

include_once "config.php";

$departid = $_POST['depart'];   // department id

$sql = "SELECT id,code FROM gyártó WHERE code=".$departid;

$result = mysqli_query($con,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['id'];
    $name = $row['CODE'];

    $users_arr[] = array("id" => $userid, "code" => $name);
}

echo json_encode($users_arr);