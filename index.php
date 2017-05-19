<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>quan ly khach hang</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet"  href="style/webstyle.css" />
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>



    </head>
    <body class="index">
        <div class="container-fluid" >
            <header >
                <nav class="navbar navbar-default "  >
                    <div class="navbar-brand ">
                        <img class="logoad1" src="image/logoad.png">

                    </div>

                    <div>
                        <label class="navbar-brand">Quản lý nhân viên</label>

                    </div>
                </nav>
            </header>
            <div class="container">



                <form class="navbar-nav" method="POST"  >
                    <div class="login form-group"  >
                        <nav class="navbar navbar-default padloginform"  >
                            <div class="row">
                                <img class="logoad" src="image/admin.png">
                            </div>

                            <div class="row" >
                                <div class="input-group pademail"> 
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user" ></span>
                                    </div> <input class="form-control" placeholder="email@gmail.com" name="txtemail" type="email" required> 
                                </div> 


                            </div>
                            <div class="row">
                                <div class="form-group"> 
                                    <div class="input-group pademail"> 
                                        <div class="input-group-addon " ><span class="glyphicon glyphicon-lock" ></span>
                                        </div> <input class="form-control" placeholder="******" name="txtpassword" type="password" required> 
                                    </div> 
                                </div> 
                            </div>
                            <div class=" text-center col-sm-12">
                                <?php
                                //session_start();


                                if (isset($_POST['login'])) {
                                    $txtemail = $_POST['txtemail'];
                                    $txtpassword = $_POST['txtpassword'];
                                    //ket noi csdl
                                    $db = new PDO('mysql:host=localhost;dbname=dbqlnv', 'root', '');

                                    $sql = "select * from `nhanvien` where Email='$txtemail' and NgaySinh='$txtpassword' ";
                                    $kq = $db->query($sql)->rowCount();
                                    $kq2 = $db->query($sql);
                                    session_start();


                                    if ($kq == 1) {

                                        while ($r = $kq2->fetch(PDO::FETCH_ASSOC)) {
                                            if ($r['MaCV'] == 1) {
                                                header('location:LoadNV/NVnhanvien.php');
                                                 
                                            }
                                            if ($r['MaCV'] == 2) {
                                                header('location:truongphong.php');
                                                 
                                            }
                                            if ($r['MaCV'] == 3) {
                                                header('location:Admin.php');
                                              
                                            }
                                            $_SESSION['TenNV'] = $r['TenNV'];
                                            $_SESSION['MaPB']=$r['MaPB'];
                                            $_SESSION['MaCV']=$r['MaCV'];
                                            
                                        }
                                    } else {
                                        echo ' <p style="color:red;textsize:30" >Sai Email hoặc Mật khẩu!</p>';
                                    }
                                }
                                ?>

                            </div>

                            <hr class="loginthongbao">


                            <div class="form-group">
                                <div class=" col-sm-12 text-center" >
                                    <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </nav>
                    </div>
                </form>
            </div>

            <div class="navbar navbar-fixed-bottom footerlogin">
                <div class="navbar-inner footer">
                    <div class="container">
                        <footer>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="navbar-text" style="color: blue" >Công ty trách nhiệm hữu hạn 3 thành viên : <a href="#" target="_blank">Nguyễn Hoài Nghiệp</a> ,<a href="#" target="_blank">Nguyễn Thiện Nhật</a>, <a href="#" target="_blank">Nguyễn Đức Cảnh</a>
                                    </label>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>



    </body>

</html>
