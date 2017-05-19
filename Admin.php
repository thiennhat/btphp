<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>BT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/angular.min.js"></script>
        <link type="text/css" rel="stylesheet"  href="style/webstyle.css" />



        <link href="css/datepicker.css" rel="stylesheet" />



        <script src="js/bootstrap-datepicker.js"></script>
<!--        <script>
            $(function () {

                $('.datepicker').datepicker({format: "yyyy//mm/dd"}).on('changeDate', function (ev) {
                    $(this).datepicker('.show');
                });
             
            });




        </script>-->



    </head>
    <body  ng-app="myApp" ng-controller="CR">
        <div>
            <label>
                <?php
                session_start();
                echo 'xin chao:';
                echo $_SESSION['TenNV'];
                ?>
                
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
            <div class="row">
                
                <a data-toggle="modal" href="#addphongban" class="btn btn-primary col-md-2"><span class="glyphicon glyphicon-cloud"></span>Add phong ban</a>
            </div>
            <div class="row">
                
                <a data-toggle="modal" href="#addchucvu" class="btn btn-primary col-md-2"><span class="glyphicon glyphicon-cloud"></span>Add chuc vu</a>
            </div>
            <div class="row" >
                <table class="table list">
                    <thead>
                        <tr>
                            <th>Mã Nhân Viên</th>
                            <th>Tên Nhân Viên</th>
                            <th>Ngày Sinh</th>
                            <th>Email</th>
                            <th>Mã Thuế<th>
                            <th>Mã Lương</th>
                            <th>Mã Phòng Ban</th>
                            <th>Mã Chức vụ</th>
                            

                        </tr>
                    </thead>
                    <tbody ng-repeat="t in SP | filter:txtflit">
                        <tr >
                            <td>{{t.MaNV}}</td>
                            <td>{{t.TenNV}}</td>
                            <td>{{t.NgaySinh}}</td>
                            <td>{{t.Email}}</td>
                            <td>{{t.MaThue}}</td>
                            <td>{{t.MaLuong}}</td>
                            <td>{{t.MaPB}}</td>
                            <td>{{t.MaCV}}</td>


                            <td><a href="#myModalEdit" class="btn btn-info " ng-click="sua(t.name, t.description, t.price)" id="btnEdit" data-toggle="modal" data-target="#myModalEdit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                <a href="#"  ng-click="xoa(t.MaNV)" class="btn btn-info"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
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
                            <button type="submit" ng-click="them(txtName, txtNgay, txtEmail,txtMaThue,txtMaLuong,txtMaPB,txtMaCV)"  class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Save change</button>
                        </div>
                    </div>

                </div>
            </div>
           <div class="modal fade" id="addphongban" role="dialog">
                <div class="modal-dialog">

                     Modal content
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm phòng ban</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Mã phòng ban</label>
                                        <input ng-model="txtMaPB"  type="text" class="form-control" id="form-name" placeholder="Type name" />

                                    </div>
                                    <div class="input-group">
                                        <label>Tên Phòng Ban</label>
                                        <input  ng-model="txtTenPB"  type="text"    class="form-control  "  placeholder="Nhập năm/tháng/ngày"    />
                                        




                                    </div>
                                    


                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" ng-click="thempb(txtMaPB,txtTenPB)"  class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Save change</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="addchucvu" role="dialog">
                <div class="modal-dialog">

                     Modal content
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm Chức vụ</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Mã chức vụ</label>
                                        <input ng-model="txtMaCV"  type="text" class="form-control" id="form-name" placeholder="Type name" />

                                    </div>
                                    <div class="input-group">
                                        <label>Tên chức vụ</label>
                                        <input  ng-model="txtTenCV"  type="text"    class="form-control  "  placeholder="Nhập năm/tháng/ngày"    />
                                        




                                    </div>
                                    


                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" ng-click="themcv(txtMaCV,txtTenCV)"  class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Save change</button>
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
                $http.get("XLphp/getNV.php").then(function (response) {

                    $scope.SP = response.data;

                });
            }
            ;
            $scope.xoa = function (idx) {
                $http.get("Xlphp/XLxoa.php?MaNV=" + idx).then(function (response) {
                    gettask();
                });

            };

            $scope.them = function (txtn, txtd, txte,txtt,txtl,txtpb,txtcv) {
                $http.get("XLphp/XLthem.php?txtName=" + txtn + "&txtNgay=" + txtd + "&txtEmail=" + txte+  "&txtMaThue=" + txtt + "&txtMaLuong=" + txtl+"&txtMaPB="+txtpb+"&txtMaCV="+txtcv).then(function (response) {
                    // $scope.txtName="";
                    // $scope.txtPrice="";
                    //$scope.txtDes="";

                    gettask();
                });
            };
            $scope.thempb=function (txtmpb,txttpb){
              $http.get("XLphp/XLthempb.php?txtMaPB="+txtmpb+"&txtTenPB="+txttpb).then(function (response){
                  gettask();
              });  
            };
             $scope.themcv=function (txtmcv,txttcv){
              $http.get("XLphp/XLthemCV.php?txtMaCV="+txtmcv+"&txtTenCV="+txttcv).then(function (response){
                  gettask();
              });  
            };
//            $scope.sua = function (txtn, txtd, txtp) {
//                $http.get("xlphp/xlsua.php?txtName="+ txtn + "&txtDes=" + txtd + "&txtPrice=" + txtp).then(function (response) {
//
//
//                    $scope.sname = txtn;
//                    $scope.sdes = txtd;
//                    $scope.sprice = txtp;
//                    gettask();
//                });
//
//            };

        });



    </script>


</html>
