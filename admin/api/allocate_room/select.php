<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$id = test_input($_GET['id']);

if($id == "") {
  header("Location: /admin/update_fee_details.php?default_error_msg=Invalid Student ID.");
  exit;
} else {
  $stmt = $conn->prepare("SELECT fee FROM student_fee WHERE student_id = ?");
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->store_result();
  $numrows = $stmt->num_rows;
  if($numrows > 0) {
    $stmt->bind_result($fee);
    $stmt->fetch();
    echo $fee;
    $stmt->close();
    $conn->close();
  } else {
    echo "0";
    $stmt->close();
    $conn->close();
  }
}
