<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$id = test_input($_GET['id']);

if($id == "") {
  header("Location: /admin/add_rooms.php?default_error_msg=Invalid Room ID.");
  exit;
} else {
  $stmt = $conn->prepare("SELECT room_number FROM rooms WHERE id = ?");
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->store_result();
  $numrows = $stmt->num_rows;
  if($numrows > 0) {
    $stmt = $conn->prepare("DELETE FROM rooms WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /admin/add_rooms.php?default_error_msg=Room Deleted Successfully.");
    exit;
  } else {
    $stmt->close();
    $conn->close();
    header("Location: /admin/add_rooms.php?default_error_msg=Romm Number not found!");
    exit;
  }
}
