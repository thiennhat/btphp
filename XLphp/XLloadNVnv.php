<?php 

//$db = new PDO ('mysql:host=localhost;dbname=dbqlnv','root','');
//$sql="SELECT tenpb,tencv,tennv,ngaysinh,email,mathue from nhanvien,chucvu,phongban WHERE nhanvien.MaCV=chucvu.MaCV and nhanvien.MaPB=phongban.MaPB and nhanvien.MaPB=1";
//
//$result=$db->query($sql);
//$arr = array();
//while($r=$result->fetch(PDO::FETCH_ASSOC))
//{
// 
//    $arr[] = $r;
//    //$r['NgaySinh']
//}
//
//
//echo $json_response = json_encode($arr);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// tạo kết nối database
$conn = new mysqli("localhost","root","","dbqlnv");
 
// tạo câu truy vấn
$result = $conn->query("SELECT tenpb,tencv,tennv,ngaysinh,email,mathue from nhanvien,chucvu,phongban WHERE nhanvien.MaCV=chucvu.MaCV and nhanvien.MaPB=phongban.MaPB and nhanvien.MaPB=1");
 
$outp = "";
 
//dùng vòng while để lấy dữ liệu và xuất dưới dạng JSON
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["tencv"] . '",';
    $outp .= '"tennv":"'   . $rs["tennv"]        . '",';
    $outp .= '"phongban":"'. $rs["tenpb"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
 
// đóng kết nối
$conn->close();
 
echo($outp);



?>