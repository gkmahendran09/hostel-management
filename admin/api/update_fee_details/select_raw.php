<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$result = $conn->query("SELECT id, name, role FROM student");
if($result->num_rows > 0) {
  $r = '<option value="">Select a Student</option>';
  while($row = $result->fetch_assoc()) {
      $r .= "<option value='" . $row['id'] ."' rel = '" . $row['role'] . "-" . $row['name'] . "'>" . $row['role'] . "-" . $row['name'] . "</option>";
  }
  echo $r;
  $conn->close();
} else {
  echo "Empty";
}
