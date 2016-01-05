<?php
include("../../admin_check.php");

include("../../../inc/utils.php");
include("../../../inc/db_connection.php");


// $result = $conn->query("SELECT student.name, student.role, student_room.room_id, student_fee.fee FROM student INNER JOIN student_room INNER JOIN student_fee ON student.id=student_room.student_id=student_fee.student_id");
$result = $conn->query("SELECT a.name as `Name`, a.role as `Reg.No`, b.fee as `Balance Fee` FROM student a, student_fee b WHERE a.id=b.student_id");
while($data = $result->fetch_assoc()) {
  $r[] = $data;
}
$conn->close();

download_send_headers("data_export_" . date("Y-m-d") . ".csv");
echo array2csv($r);
die();



function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}
