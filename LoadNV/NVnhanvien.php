<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Thông tin nhân viên</title>
        <meta charset="UTF-8">

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-3.2.0.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/angular.min.js"></script>
        <link type="text/css" rel="stylesheet"  href="../style/webstyle.css" />



        <link href="../css/datepicker.css" rel="stylesheet" />



        <script src="../js/bootstrap-datepicker.js"></script>




    </head>
    <body  ng-app="myApp" ng-controller="CR">

        <?php
        session_start();

        if ($_SESSION['MaCV'] == 1) {
            echo '<button>aa</button>';
        }
        ?>
        <div>
            <label>
                <?php
                echo $_SESSION['TenNV'];
                ?>
                aaaaaa
            </label>
        </div>
        <div class="container">
            <div class="row">
                <label class="col-md-1 control-label">Product</label>
            </div>
            <div class="row">
                <form class="col-md-10">
                    <input type="text" name="txtSearch" ng-model="txtflit" class="form-control" placeholder="search product" />
                </form>
                <a data-toggle="modal" href="#myModalAdd" class="btn btn-primary col-md-2"><span class="glyphicon glyphicon-cloud"></span>Add New</a>
            </div>
            <div class="row" >
                <table class="table list">
                    <thead>
                        <tr>

                            <th>Tên Nhân Viên</th>
                            <th>Ngày Sinh</th>
                            <th>Email</th>
                            <th>Mã Thuế<th>                           
                            <th>Tên Phòng Ban</th>
                            <th>Tên Chức vụ</th>


                        </tr>
                    </thead>
                    <tbody >
                        <tr >
                            <?php
                            try {
                                $db = new PDO('mysql:host=localhost;dbname=dbqlnv', 'root', '');
                                $sql = "SELECT tenpb,tencv,tennv,ngaysinh,email,mathue from nhanvien,chucvu,phongban WHERE nhanvien.MaCV=chucvu.MaCV and nhanvien.MaPB=phongban.MaPB and nhanvien.MaPB=1";

                                $result = $db->query($sql);


                                while ($r = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>';
                                    echo '    <td>' . $r['tennv'] . '</td>';
                                    echo '    <td>' . $r['ngaysinh'] . '</td>';
                                    echo '    <td>' . $r['email'] . '</td>';
                                    echo '    <td>' . $r['mathue'] . '</td>';
                                    echo '    <td>' . $r['tenpb'] . '</td>';
                                    echo '    <td>' . $r['tencv'] . '</td>';



                                        if ($_SESSION['MaCV'] == 1) {
                                        echo '<td><button>aa</button></td>';
                                     }



                                    echo '</tr>';
                                }
                            } catch (Exception $ex) {
                                echo $ex->getMessage();
                                exit();
                            }
                            ?>




                        </tr>

                    </tbody>
                </table>
            </div>  



            <!--star popup add product-->

            <!-- Modal -->
            <div class="modal fade" id="myModalAdd" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm nhân viên</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Họ tên</label>
                                        <input ng-model="txtName"  type="text" class="form-control" id="form-name" placeholder="Type name" />

                                    </div>
                                    <div class="input-group">
                                        <label>Ngày Sinh</label>
                                        <input  ng-model="txtNgay"   type="text"    class="form-control  "  placeholder="Nhập năm/tháng/ngày"    />





                                    </div>
                                    <div class="input-group">
                                        <label>Email</label>
                                        <input ng-model="txtEmail" type="text"  class="form-control" id="Text1" placeholder="Type name" />

                                    </div>
                                    <div class="input-group">
                                        <label>Mã Thuế</label>
                                        <select ng-model="txtMaThue"  type="text"  class="form-control" id="Text1" >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>

                                        </select>


                                    </div>
                                    <div class="input-group">
                                        <label>Mã Lương</label>
                                        <select ng-model="txtMaLuong"  type="text"  class="form-control" id="Text1" >
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>

                                        </select>


                                    </div>
                                    <div class="input-group">
                                        <label>Mã Phòng ban</label>
                                        <select  ng-model="txtMaPB" type="text"   class="form-control " id="Text1"  >
                                            <option >1</option>
                                            <option>2</option>
                                            <option>3</option>

                                        </select>


                                    </div>
                                    <div class="input-group">
                                        <label>Mã Chức vụ</label>
                                        <select ng-model="txtMaCV"  type="text"  class="form-control" id="Text1" >
                                            <option>1</option>
                                            <option>2</option>


                                        </select>



                                    </div>



                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" ng-click="them(txtName, txtNgay, txtEmail, txtMaThue, txtMaLuong, txtMaPB, txtMaCV)"  class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Save change</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--end popup-->

            <!--star popup edit product-->

            <!-- Modal -->
            <div class="modal fade" id="myModalEdit" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit product</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form">
                                <div class="row">
                                    <div class="input-group-addon">
                                        <label>Name</label>
                                        <input ng-model="sname" type="text" name="txtName" class="form-control" id="form-name" placeholder="Type name" />

                                    </div>

                                    <div class="input-group-addon">
                                        <label>Description</label>
                                        <input ng-model="sdes" type="text" class="form-control" id="Text2" placeholder="Type name" />

                                    </div>
                                    <div class="input-group-addon">
                                        <label>Price</label>
                                        <input ng-model="sprice" type="text" class="form-control" id="Text1" placeholder="Type name" />

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <button type="submit" ng-click="sua(sname, sdes, sprice)" class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Save change</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!--end popup-->

        </div>





    </body>

    <script>

        var app = angular.module('myApp', []);
        app.controller('CR', function ($scope, $http) {

            gettask();
            function gettask() {
                $http.get("../XLphp/XLloadNVnv.php").then(function (response) {

                    $scope.NV = response.data;

                });
            }
            ;


        });



    </script>


</html>
