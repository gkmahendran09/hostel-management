<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");
$id = test_input($_GET['id']);

if($id == "") {
  header("Location: /admin/manage_students.php?default_error_msg=Invalid Student ID.");
  exit;
} else {

  $stmt = $conn->prepare("SELECT id FROM student WHERE id = ?");
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->store_result();
  $numrows = $stmt->num_rows;
  if($numrows > 0) {
    $sql = "DELETE FROM student WHERE id=".$id;

    if ($conn->query($sql) === TRUE) {
        header("Location: /admin/manage_students.php?default_error_msg=Student Deleted Successfully.");
    } else {
        header("Location: /admin/manage_students.php?default_error_msg=Error Student not removed.");
    }
    // $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
    // $stmt->bind_param('s', $id);
    // $stmt->execute();
    // $stmt->close();
    // $conn->close();
    // header("Location: /admin/manage_students.php?default_error_msg=Student Deleted Successfully.");
    exit;
  } else {
    $stmt->close();
    $conn->close();
    header("Location: /admin/manage_students.php?default_error_msg=Student not found!");
    exit;
  }
}
