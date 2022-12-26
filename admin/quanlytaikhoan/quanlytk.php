<?php 
    include('../../Db/dbhelper.php');
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);
    // $user=[];
    // $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quản lý tài khoản</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../Assets/Css/main.css">
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
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../thongtintaikhoan.php" id="show">Thông tin tài khoản</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../../logout.php">Đăng xuất</a></li>
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
                                    <a href="../../admin/index.php" class="nav-link align-middle px-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Trang chủ">
                                      </i> <span class="ms-1 ">Trang chủ</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../admin/quanlydonhang/quanlydh.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Đơn Hàng">
                                        <span class="ms-1">Danh Sách Đơn Đặt</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Tài Khoản">
                                        <span class="ms-1">Quản Lý Tài Khoản</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../admin/quanlysanpham/quanlysp.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Sản Phẩm">
                                        <span class="ms-1 ">Quản Lý Sản Phẩm</span>
                                    </a>
                                </li>
                                
                            </ul>
                    </div>
                </div>
                <div class="col py-3">
                    <div class="container">
                        <div class="panel panel-primary" style="overflow-x:auto;">
                            <div class="panel-heading">
                                <h2 class="text-center">Quản Lý Tài khoản</h2>
                            </div>
                            <div class="panel-body">
                                <a href="add.php">
                                    <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Tài Khoản</button>
                                </a>
                                <table class="table table-bordered table-hover table-responsive" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên đăng nhập</th>
                                            <th>Tên đầy đủ</th>
                                            <th>SĐT</th>
                                            <th>Mật khẩu</th>
                                            <th>Địa chỉ</th>
                                            <!-- <th>ID Khoa</th> -->
                                            <th width="40px"></th>
                                            <th width="40px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql1 = 'select * from tai_khoan where roles="khách" and trang_thai="hoatdong"';
                                        $taikhoanList = executeResult($sql1);
                                        $index=1;
                                        foreach ($taikhoanList as $item) {
                                        
                                        echo'<tr>
                                            <td>'.($index++).'</td>
                                            <td>'.$item['ten_dn'].'</td>
                                            <td>'.$item['ten'].'</td>
                                            <td>'.$item['sdt'].'</td>
                                            <td>'.$item['mk'].'</td>
                                            <td>'.$item['address'].'</td>
                                            <td>
                                                <a href="edit.php?id_tk='.$item['id_tk'].'">
                                                    <button class="btn btn-warning">Sửa</button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="deletetaikhoan('.$item['id_tk'].')">Xóa</button>
                                            </td>
                                        </tr>';
                                    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            function deletetaikhoan(id_tk) {
                var option = confirm("Bạn có chắc muốn xóa danh mục này không?")
                if (!option) {
                    return;
                }
                $.post('ajax.php',
                {
                    'id_tk' : id_tk,
                    'action': 'delete'
                },function (data) {
                    location.reload()
                })
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