<?php
include("../../student_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$r = array();

//Student Fee
$result = $conn->query("SELECT fee FROM student_fee WHERE student_id=".$_SESSION['student_id']);
$r[0] = $result->fetch_array()[0];

//Student Room Number
$room_id_obj = $conn->query("SELECT room_id FROM student_room WHERE student_id=".$_SESSION['student_id']);
$room_id = $room_id_obj->fetch_array()[0];
$result = $conn->query("SELECT room_number FROM rooms WHERE id=".$room_id);
if($result) {
  $r[1] = $result->fetch_array()[0];
} else {
  $r[1] = null;
}



$conn->close();

echo json_encode($r);
