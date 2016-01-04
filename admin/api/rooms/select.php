<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$result = $conn->query("SELECT id, room_number, space FROM rooms");
if($result->num_rows > 0) {
  echo '<table class="table table-bordered"><thead><tr><th class="text-center">Room No.</th><th class="text-center">Total Space</th><th class="text-center">Action</th></thead><tbody>';
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['room_number'] . "</td><td>" . $row['space'] . "</td><td><a href='/admin/api/rooms/delete.php?id=" . $row['id'] . "' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a></tr>";
  }
  echo '</tbody></table>';
  $conn->close();
} else {
  echo "No Rooms Available!";
}
