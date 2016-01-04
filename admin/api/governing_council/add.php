<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$name = test_input($_POST['name']);
$designation = test_input($_POST['designation']);

if($name == "" || $designation == "") {
  header("Location: /admin/edit_governing_council.php?default_error_msg=All Fields are mandatory.");
  exit;
} else {
    $stmt = $conn->prepare("INSERT INTO governing_council (name, designation) VALUES (?, ?)");
    $stmt->bind_param('ss', $name, $designation);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: /admin/edit_governing_council.php?default_error_msg=Member Added!");
    exit;
}
