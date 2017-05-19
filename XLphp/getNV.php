<?php

$db = new PDO ('mysql:host=localhost;dbname=dbqlnv','root','');
$sql="select * from nhanvien";






$result=$db->query($sql);
$arr = array();
while($r=$result->fetch(PDO::FETCH_ASSOC))
{
   
    $arr[] = $r;
    //$r['NgaySinh']
}


echo $json_response = json_encode($arr);

?>