<?php
$idxoa = $_GET['MaNV'];
$cmd = "DELETE FROM nhanvien WHERE MaNV='$idxoa'";
$db = new PDO('mysql:host=localhost;dbname=dbqlnv', 'root', '');
$kt = $db->exec($cmd);
echo $json_response = json_encode($kt);
?>


