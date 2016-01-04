<?php
// include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$result = $conn->query("SELECT name, designation FROM governing_council");
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row['name'] . "</td><td>" . $row['designation'] . "</td></tr>";
  }
  $conn->close();
} else {
  echo "";
}
