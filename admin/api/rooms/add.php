<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$roomno = test_input($_POST['roomno']);
$space = test_input($_POST['space']);

if($roomno == "" || $space == "" || !is_numeric($space)) {
  header("Location: /admin/add_rooms.php?default_error_msg=All Fields are mandatory. Only enter numeric values for Space.");
  exit;
} else {
  $stmt = $conn->prepare("SELECT room_number FROM rooms WHERE room_number = ?");
  $stmt->bind_param('s', $roomno);
  $stmt->execute();
  $stmt->store_result();
  $numrows = $stmt->num_rows;
  if($numrows > 0) {
    $stmt->close();
    $conn->close();
    header("Location: /admin/add_rooms.php?default_error_msg=Room number already taken. Please try different Room Number.");
    exit;
  } else {
    $stmt = $conn->prepare("INSERT INTO rooms (room_number, space) VALUES (?, ?)");
    $stmt->bind_param('ss', $roomno, $space);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /admin/add_rooms.php?default_error_msg=Room Added!");
    exit;
  }
}
