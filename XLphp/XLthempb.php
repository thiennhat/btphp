<?php
$mapb=$_GET['txtMaPB'];
$tenpb=$_GET['txtTenPB'];

$cmdpb="insert into `phongban`(`MaPB`,`TenPB`) values('$mapb','$tenpb')";
$db=new PDO('mysql:host=localhost;dbname=dbqlnv','root','');
$kt=$db->exec($cmdpb);

?>

