<?php
include("../inc/utils.php");
include("../inc/db_connection.php");

$uname = test_input($_POST['uname']);
$pass = sha1(test_input($_POST['password']));
$role = test_input($_POST['role']);

if($role == "admin" || $role == "student") {
    $stmt = $conn->prepare("SELECT id,name,role FROM $role WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $uname, $pass);
    $stmt->execute();
    $stmt->store_result();
    $numrows = $stmt->num_rows;
    if($numrows > 0) {
      $stmt->bind_result($id_value, $name_value, $role_value);
      $stmt->fetch();
      $id = $role . "_id";
      $name = $role . "_name";
      $r = $role . "_role";
      session_start();
      $_SESSION[$id] = $id_value;
      $_SESSION[$name] = $name_value;
      $_SESSION[$r] = $role_value;

      $url = "../" . $role . '/';
      header("Location:" . $url);
      exit;

    } else {
      $url = '../index.php?' . $role . '_login_error_msg=Invalid User';
      header("Location:" . $url);
      exit;
    }
    $stmt->close();
    $conn->close();
} else {
  header("Location: ../index.php?default_error_msg=Invalid Login");
  exit;
}
