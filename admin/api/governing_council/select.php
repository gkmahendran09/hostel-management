<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$result = $conn->query("SELECT id, name, designation FROM governing_council");
if($result->num_rows > 0) {
  echo '<table class="table table-bordered"><thead><tr><th class="text-center">Name</th><th class="text-center">Designation</th><th class="text-center">Action</th></thead><tbody>';
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['name'] . "</td><td>" . $row['designation'] . "</td><td><a href='/admin/api/governing_council/delete.php?id=" . $row['id'] . "' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> Delete</a></td></tr>";
  }
  echo '</tbody></table>';
  $conn->close();
} else {
  echo "Empty";
}
