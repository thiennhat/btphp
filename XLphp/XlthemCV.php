<?php
$macv=$_GET['txtMaCV'];

$tencv=$_GET['txtTenCV'];
$cmdcv="insert into `chucvu`(`MaCV`,`TenCV`) values('$macv','$tencv')";

$db=new PDO('mysql:host=localhost;dbname=dbqlnv','root','');
$kt=$db->exec($cmdcv);

?>

