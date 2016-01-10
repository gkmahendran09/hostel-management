<?php
session_start();
if(isset($_SESSION['student_name']) && isset($_SESSION['student_role'])) {
    $name = $_SESSION['student_name'];
    $role = $_SESSION['student_role'];
} else {
  header("Location: ../index.php?default_error_msg=Session Expired or Invalid Login!");
  exit;
}
