<?php 
    require_once('../../Db/dbhelper.php');
    
    // $user=[];
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);


    $id_tk=$ten_dn=$ten=$sdt=$mk=$address='';
    if (isset($_POST['luu'])) {      
            $id_tk = $_POST['id_tk'];             
            $ten_dn = $_POST['ten_dn'];
            $ten = $_POST['ten'];     
            $sdt = $_POST['sdt'];
            $mk = $_POST['mk'];
            $address = $_POST['address'];
        
            //Luu vao database
            
            $sql1 = 'insert into tai_khoan(ten_dn,ten,sdt,mk,address,roles, trang_thai) 
            values ("'.$ten_dn.'","'.$ten.'","'.$sdt.'","'.$mk.'","'.$address.'","khách","hoatdong")';
            
            execute($sql1);

            header('Location: quanlytk.php');
            // echo($sql2);
            // die();           
    }

   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Thêm Tài Khoản</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
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
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Đăng ký học">
                                        <span class="ms-1 ">Quản lý đơn hàng</span> </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../admin/quanlytaikhoan/quanlytk.php" class="nav-link px-0 align-middle" data-bs-toggle="tooltip" data-bs-placement="right" title="Quản Lý Tài Khoản">
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="text-center">Thêm Tài Khoản</h2>                               
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="name">Tên đăng nhập:</label>
                                        <input type="text" name="id_tk" hidden="true" value="<?=$id_tk?>">
                                        <input required="true" type="text" class="form-control" id="ten_dn" name="ten_dn" value="<?=$ten_dn?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên đầy đủ:</label>
                                        <input required="true" type="text" class="form-control" id="ten" name="ten" value="<?=$ten?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Số điện thoại:</label>
                                        <input required="true" type="int" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mật khẩu:</label>
                                        <input required="true" type="text" class="form-control" id="mk" name="mk" value="<?=$mk?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Địa chỉ:</label>
                                        <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$address?>">
                                    </div>
                                    <button name="luu" class="btn btn-success" type="submit" style="margin-top: 15px;" >Lưu</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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