<?php
include("../inc/utils.php");
include("../inc/db_connection.php");

$name = test_input($_POST['name']);
$regno = test_input($_POST['regno']);
$uname = test_input($_POST['uname']);
$pass = sha1(test_input($_POST['password']));
$role = test_input($_POST['role']);

if($role == "student") {
    if($name == "" || $regno == "" || $uname == "" || $pass == "" || $role == "") {
      $url = '../index.php?' . $role . '_register_error_msg=All Fields are mandatory.';
      header("Location:" . $url);
      exit;
    } else {
      $stmt = $conn->prepare("SELECT username FROM $role WHERE username = ? OR role = ?");
      $stmt->bind_param('ss', $uname, $regno);
      $stmt->execute();
      $stmt->store_result();
      $numrows = $stmt->num_rows;
      if($numrows > 0) {
        $stmt->close();
        $conn->close();
        header("Location: ../index.php?default_error_msg=Username already taken. Please try different username. (or) Registration Number Exists.");
        exit;
      } else {
        $stmt = $conn->prepare("INSERT INTO $role (name, username, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $uname, $pass, $regno);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: ../index.php?default_error_msg=Student Registration Success! Login using your credentials.");
        exit;
      }
    }
} else {
  header("Location: ../index.php?default_error_msg=Invalid Registration Info");
  exit;
}
