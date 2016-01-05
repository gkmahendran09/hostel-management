<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");

$r = array();

$result = $conn->query("SELECT * FROM student");
$r[0] = $result->num_rows;

$result = $conn->query("SELECT * FROM rooms");
$r[1] = $result->num_rows;

$result = $conn->query("SELECT SUM(fee) FROM student_fee");
$r[2] = $result->fetch_array()[0];

$conn->close();
echo json_encode($r);
