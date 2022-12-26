<?php 
    include('../Db/dbhelper.php');
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>giày lily</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../Assets/Css/main.css">
    </head>
    <body>
        
        <div class="top-side " style="background-color: #808080">
            <div class="frame-top" style="background-color: #2F4F4F">
                <div class="row  align-items-center page-header justify-content-between">
                    <div class="col-md-6 col-6 col-sm-6">
                        <div class=" d-flex  header-logo">
                            <div class="logo col-md-2 col-2 col-sm-2 text-center" style = "color: #FFFFFF;">
                                <h2>GIÀY LILY</h2>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($user['ten_dn'])){?>
                    <div id="Dang-nhap " class="col-md-6 col-6 col-sm-6 " style="font-size:15px;color:grey;padding-top: 10px;">
                        <div class="dropdown pb-4 text-end">
                            <div class="block">
                                <?php if($user['roles']=='admin'){?>
                                <a href="#" class="text-white text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><i class="bi bi-person-circle"></i></span>
                                    <span class=""><?php echo $user['ten_dn'] ?></span> 
                                    <span class="d-none d-sm-inline mx-1"></span> 
                                </a>
                                <?php }?>
                            <ul class="dropdown-menu dropdown-menu-dark ">
                                <li><a class="dropdown-item" href="thongtintaikhoan.php" id="show">Thông tin tài khoản</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../logout.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 sidebar" style="background-color: #000000">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        
                        
                            <ul class="navbar-nav nav-pills" id="menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                      </i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="quanlydonhang/quanlydh.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Đơn Hàng">
                                        <span class="ms-1">Danh Sách Đơn Đặt</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="quanlytaikhoan/quanlytk.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Tài Khoản">
                                        <span class="ms-1">Quản Lý Tài Khoản</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="quanlysanpham/quanlysp.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sản Phẩm">
                                        <span class="ms-1 ">Quản Lý Sản Phẩm</span>
                                    </a>
                                </li>
                                
                            </ul>
                       
                    </div>
                </div>
                <div class="col py-3">
                    <div class="container">
                      

                      <div class="panel panel-primary" style="overflow-x:auto;">
                            <div class="admin_iteam_add">
                                <h2><i style="color: #FFC312;margin-right: 3px;" class="fas fa-chart-pie"></i>Thống Kê</h2>
                                <form method="post">
                                    <div style="width: 100%;margin-top: 30px;">
                                        <div class="input-group form-group" style="width: 400px;float: left;margin-bottom: 30px;">
                                            <input onclick="checkradio()" id="radiongay" type="radio" name="" style="margin-left: 20px;margin-right: 20px;margin-top: 10px;">
                                            <label style="margin-right: 20px;margin-top: 3px;">Theo Ngày</label>
                                            <input id="datengay" class="form-control"  type="datetime-local">
                                        </div>
                                        <div class="input-group form-group" style="width: 400px;float: left;margin-left: 100px;margin-bottom: 30px;">
                                            <input onclick="checkradio2()" id="radiothang" type="radio" name="" style="margin-left: 20px;margin-right: 20px;margin-top: 10px;">
                                            <label style="margin-right: 20px;margin-top: 3px;">Theo Tháng</label>
                                            <input id="datethang" class="form-control"  type="datetime-local">
                                        </div>
                                    </div>
                                    <div class="input-group form-group" style="width: 400px;">
                                        <button onclick="thongke()" style="margin-left: 20px;color: #ffff;background: #198754; font-family: 'Lato';float: left;width: 200px;" type="button"class="btn float-right login_btn"><i style="margin-right: 10px;" class="fas fa-chart-line"></i>Thống Kê</button> 
                                    </div>
                                    <div class="table" style="width: 90%;left: 5%;border-bottom: 1px solid black;position: absolute;bottom: 50px;">
                                        <label style="float: left;font-size: 18px;margin-left: 260px;color: black;">Tổng doanh thu</label>
                                        <label style="float: right;margin-right: 20px;font-size: 18px;color: #f23333" id="tongtienthongke"></label>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function checkradio()
            {
                document.getElementById("radiongay").checked = true;
                document.getElementById("radiothang").checked = false;
            }
            function checkradio2()
            {
                document.getElementById("radiongay").checked = false;
                document.getElementById("radiothang").checked = true;
            }
            function thongke()
            {
                if(document.getElementById("radiongay").checked == true)
                {
                    var date = document.getElementById("datengay").value;
                    if(date != "")
                    {
                        $.post('thongke.php',{'date':date},function(data)
                        { 
                            document.getElementById("tongtienthongke").innerHTML = data+"₫";
                        });
                        
                    }
                    else
                    {
                        alert("Mời bạn chọn ngày cần thống kê");
                    }
                }
                else if(document.getElementById("radiothang").checked == true)
                {
                    var date = document.getElementById("datethang").value;
                    if(date != "")
                    {
                        $.post('thongke.php',{'date1':date},function(data)
                        { 
                            document.getElementById("tongtienthongke").innerHTML = data+"₫";
                        });
                        
                    }
                    else
                    {
                        alert("Mời bạn chọn ngày cần thống kê");
                    }
                }
                else
                {
                    alert("Mời bạn chọn dặc điểm thống kê");
                }
            }
        </script>
    </body>
    <footer class="text-center text-white" style="background-color: #2F4F4F">
        <div class="container p-4 pb-0">
          <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-facebook"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="bi bi-twitter"></i></a>
          </section>
        </div>
        <div class="text-center p-3" style="background-color: #2F4F4F">
           © CÔNG TY CỔ PHẦN SX VÀ XNK HNC
        </div>
    </footer>
</html>
<!-- class="d-none d-sm-inline " -->