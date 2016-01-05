<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$student_id = test_input($_POST['student_id']);
$room_id = test_input($_POST['room_id']);

if($student_id == "" || $room_id == "") {
  header("Location: /admin/allocate_rooms.php?default_error_msg=All Fields are mandatory.");
  exit;
} else {
    $stmt = $conn->prepare("SELECT id FROM student_room WHERE room_id = ?");
    $stmt->bind_param('s', $room_id);
    $stmt->execute();
    $stmt->store_result();
    $numrows = $stmt->num_rows;
    // echo "Num rows = " . $numrows . "<br>";

    $stmt = $conn->prepare("SELECT space FROM rooms WHERE id = ?");
    $stmt->bind_param('s', $room_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($space);
    $stmt->fetch();
    // echo "space = " . $space;
    // exit;
    if($numrows < $space) {
      $stmt = $conn->prepare("INSERT INTO student_room (student_id, room_id) VALUES (?, ?)");
      $stmt->bind_param('ss', $student_id, $room_id);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      header("Location: /admin/allocate_rooms.php?default_error_msg=Student Allocated to Room");
      exit;
    } else {
      $stmt->close();
      $conn->close();
      header("Location: /admin/allocate_rooms.php?default_error_msg=Room Full. Please increase room space (or) Allocate existing students to another room");
      exit;
    }
}
