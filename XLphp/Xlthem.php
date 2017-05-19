<?php
$name=$_GET['txtName'];
$ngays=$_GET['txtNgay'];
$email=$_GET['txtEmail'];
$mathue=$_GET['txtMaThue'];
$maluong=$_GET['txtMaLuong'];
$mapb=$_GET['txtMaPB'];
$macv=$_GET['txtMaCV'];


//$res = mysql_query('SELECT `NgaySinh` FROM `nhanvien`  WHERE `NgaySinh` = "'.$ngays.'"');
//$row = mysql_fetch_array($res);

 
//$dateluu=  str_replace('/', '-', "$date");

//echo $dateluu;
$cmd="insert into `nhanvien`(`TenNV`,`NgaySinh`,`Email`,`MaLuong`,`MaPB`,`MaCV`,`MaThue`) values ('$name','$ngays','$email','$maluong','$mapb','$macv','$mathue')";
//$cmdl="insert into `nhanvien`(`MaLuong`) values('$maluong')";
//$cmdt="insert into `thue`(`MaThue`) values('$mathue')";
//$cmdpb="insert into `phongban`(`MaPB`) values('$mapb')";
//$cmdcv="insert into `chucvu`(`MaCV`) values('$macv')";
$db=new PDO('mysql:host=localhost;dbname=dbqlnv','root','');
$kt=$db->exec($cmd);//,$cmdl,$cmdt,$cmdpb,$cmdcv);




 // 31.07.2012
//echo $date->format('d-m-Y'); // 31-07-2012
//echo $json_response=  json_encode($kt);
//echo $kq;



?>

