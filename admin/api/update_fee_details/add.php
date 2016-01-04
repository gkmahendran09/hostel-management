<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$id = test_input($_POST['name']);
$amount = test_input($_POST['amount']);

if($id == "" || $amount == "") {
  header("Location: /admin/update_fee_details.php?default_error_msg=All Fields are mandatory.");
  exit;
} else {
    $stmt = $conn->prepare("SELECT id FROM student_fee WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->store_result();
    $numrows = $stmt->num_rows;
    if($numrows > 0) {
      $stmt = $conn->prepare("UPDATE TABLE student_fee SET fee = ? WHERE student_id = ?)");
      $stmt->bind_param('ss', $amount, $id);
    } else {
      $stmt = $conn->prepare("INSERT INTO student_fee (student_id, fee) VALUES (?, ?)");
      $stmt->bind_param('ss', $id, $amount);
    }
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /admin/update_fee_details.php?default_error_msg=Student Fee Updated!");
    exit;
}
