<?php
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_role'])) {
    $name = $_SESSION['admin_name'];
    $role = $_SESSION['admin_role'];
} else {
  header("Location: ../index.php?default_error_msg=Session Expired or Invalid Login!");
  exit;
}
