<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$result = $conn->query("SELECT id, name, role FROM student");
$r = array();
if($result->num_rows > 0) {
  $r[0] = '<option value="">Select a Student</option>';
  while($row = $result->fetch_assoc()) {
      $r[0] .= "<option value='" . $row['id'] ."' rel = '" . $row['role'] . "-" . $row['name'] . "'>" . $row['role'] . "-" . $row['name'] . "</option>";
  }
} else {
  $r[0] = "Empty";
}

$result = $conn->query("SELECT id, room_number, space FROM rooms");
if($result->num_rows > 0) {
  $r[1] = '<select class="form-control" name="room_id" required="true"><option value="">Select a Room</option>';
  while($row = $result->fetch_assoc()) {
      $r[1] .= "<option value='" . $row['id'] ."' rel = '" . $row['room_number'] . "-" . $row['space'] . "'>" . $row['room_number'] . "</option>";
  }
  $r[1] .= '</select>';
} else {
  $r[1] = "Empty";
}
$conn->close();
echo json_encode($r);
