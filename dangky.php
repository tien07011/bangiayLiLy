<?php 
    require_once('Db/dbhelper.php');
    
    $id_tk=$ten_dn=$ten=$sdt=$mk=$address='';
    if (isset($_POST['luu'])) {      
            $id_tk = $_POST['id_tk'];             
            $ten_dn = $_POST['ten_dn'];
            $ten = $_POST['ten'];     
            $sdt = $_POST['sdt'];
            $mk = $_POST['mk'];
            $address = $_POST['address'];
        
            //Luu vao database
            
            $sql1 = 'insert into tai_khoan(ten_dn,ten,sdt,mk,address,roles) 
            values ("'.$ten_dn.'","'.$ten.'","'.$sdt.'","'.$mk.'","'.$address.'","khách")';
            
            execute($sql1);

            header('Location: login.php');
            // echo($sql2);
            // die();           
    }

   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../Assets/Css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
          <div class="container-fluid">
            <div class="logo">
                <img src="images/LOGO.png">
            </div>       
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button> <!-- thu phóng -->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link" href="index_min2.php?id_loai=1">GIÀY THỂ THAO</a>
                <a class="nav-link" href="index_min2.php?id_loai=2">GIÀY CAO GÓT</a>
                <a class="nav-link" href="index_min2.php?id_loai=3">SCANDAL</a>
                <a class="nav-link" href="index_min2.php?id_loai=4">BOOT</a>
              </div>
              <div class="others">
                 <li><input placeholder="Tìm kiếm" type="text" name=""><i class="fas fa-search"></i></li>
                 <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                 <li><a href=""><i class="fas fa-comment"></i></li></a>
              </div>
            </div>
            <li><a href="login.php"><i class="fas fa-user-circle"></i></li></a>
          </div>
        </nav>
       
        
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col py-3">
                    <div class="container">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               <h2 class="text-center">ĐĂNG KÝ</h2>
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
                                    <button name="luu" class="btn btn-success" type="submit" style="margin-top: 15px; text-align: center;" >Đăng ký</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../Assets/Js/toggle.js"></script>
        <div class="footer">
        <div class="footer-top">
          <li><a href=""><img src="images/dathongbao.jpg"></a></li>
          <li><a href=""></a> Giới thiệu</li>
          <li><a href=""></a> Chính sách bảo mật</li>
        </div>
        <div class="footer-bottom">
          <p >
          © CÔNG TY CỔ PHẦN SX VÀ XNK HNC <br>
          Địa chỉ: 19 Đ. Láng, Thịnh Quang, Đống Đa, Hà Nội  <br>
          SĐT:  0315025015  <br>
          Do sở KH&ĐT TP.HN cấp ngày 04/05/2020 <br>
          Email: <b> lilyshoesvn@gmail.com</b>
          </p>  
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
<!-- class="d-none d-sm-inline " -->