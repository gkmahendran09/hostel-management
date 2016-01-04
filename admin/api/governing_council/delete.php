<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$id = test_input($_GET['id']);

if($id == "") {
  header("Location: /admin/edit_governing_council.php?default_error_msg=Invalid Member ID.");
  exit;
} else {
  $stmt = $conn->prepare("SELECT id FROM governing_council WHERE id = ?");
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->store_result();
  $numrows = $stmt->num_rows;
  if($numrows > 0) {
    $stmt = $conn->prepare("DELETE FROM governing_council WHERE id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /admin/edit_governing_council.php?default_error_msg=Member Deleted Successfully.");
    exit;
  } else {
    $stmt->close();
    $conn->close();
    header("Location: /admin/edit_governing_council.php?default_error_msg=Member not found!");
    exit;
  }
}
