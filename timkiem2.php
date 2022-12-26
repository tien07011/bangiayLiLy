<?php 

  include('Db/dbhelper.php');
  $tim_kiem = $_REQUEST['tim_kiem'];  

  $sql = "Select * from san_pham  where trang_thai='dangban' and ten_sp like '%{$tim_kiem}%'";
  $sanpham = executeResult($sql);



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LILYSHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <div class="logo">
            <a href="home2.php"><img src="images/LOGO.png"></a>
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
             <form action="timkiem.php" method="Get" style="border:none;">
                <input style="text-align: center;float: left; border: none;border-bottom: 1px solid #333;" value="<?=$tim_kiem?>" name="tim_kiem" class="">
                <button style="border: none; background-color: #fff;height: 35px; width: 20px;"><i class="fas fa-search"></i></button>
              </form>
             <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
             <li><a href=""><i class="fas fa-file-invoice-dollar"></i></a></li>
          </div>
        </div>
        <li><a href="login.php"><i class="fas fa-user-circle"></i></li></a>
      </div>
    </nav>
    <section id="Slider">
              <div class="aspect-ratio-169">
                <img src="images/vd1.jpg">
              </div>
    </section>
    <div class="container text-center" style="margin-top: -200px; margin-left: 450px;" >

                <div class="iteam" style="float: left;">

                  <a class="theloai" href="index_min2.php?id_loai=1" style="">
                    <div class="imgg" style="">
                      <img src="images/3.jpg" style="" >  
                      <p style="width: 80%;">Giày Thể Thao</p>
                    </div>        
                  </a>
                </div>
                <div class="iteam" style="float: left;">
                  <a class="theloai" href="index_min2.php?id_loai=2" style="">
                    <div class="imgg" style="">
                      <img src="images/4.jpg" style="" > 
                      <p style="width: 80%;">Giày cao got</p>
                    </div>        
                  </a>
                </div>
                <div class="iteam" style="float: left;">
                  <a class="theloai" href="index_min2.php?id_loai=3" style="">
                    <div class="imgg" style="">
                      <img src="images/5.jpg" style="" >  
                      <p style="width: 80%;">Scandal</p>
                    </div>        
                  </a>
                </div>  
                <div class="iteam" style="float: left;">
                  <a class="theloai" href="index_min2.php?id_loai=4" style="">
                    <div class="imgg" style="">
                      <img src="images/7.jpg" style="" > 
                      <p style="width: 80%;">Boot</p>
                    </div>        
                  </a>
                </div>   
                
    </div>
    <div style="clear: both;"></div>
    <div class="container">
            <div class="cartegory-1">
                    <div class="cartegory-1-top-item" style="margin-top: 40px;font-size: 20px ;font-family: Courier new; font-weight: bold;">
                       Sản phẩm tìm kiếm theo: <?=  $tim_kiem?> 
                    </div>
                    <div class="container-text-center">
                      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        <?php
                        foreach ($sanpham as $key) {
                        ?>
                      
                        <div class="col-lg-3 col-sm-6 col-12" style="animation: moveBottom 2s ease-out;">
                          <a href="chitietsp2.php?id_sp=<?php echo $key['id_sp']; ?>" style="width: 100%;" >
                            
                            <div class="itemsp" style="width: 100%">
                            
                              <div class="anhsp" >
                                <img src="images/<?php echo $key['hinh_anh']; ?>"   alt="<?php echo $key['hinh_anh'] ?>" style="width: 99% ;height:99%">
                              </div>

                              <div class="in4sp" style="margin-top: 10px;margin-left: 10px;">
                                <div class="tensp" style="font-weight: bold;color: #000000cc;font-size: 17px;">
                                  <span style=""><?php echo $key['ten_sp']; ?></span>
                                </div>
                                <div class="price">
                                  <span class="giathat"  style="color: red;font-weight: bold;"><?php echo number_format($key['gia']); ?> VNĐ</span>
                                  <span class="giagiam" style="text-decoration: line-through; margin-left: 10px;" ><?php echo ($key['gia_goc']); ?> VNĐ</span>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
                        
                      
                         <?php 
                        }   
                        ?>
                      </div>
                    </div>

                    <button style="background: #ffffff;float: right;margin: 15px; border: none;border-radius: 10px"><a href="home2.php" class="button" style="font-size: 20px;"><i class="fas fa-angle-double-left"></i></a></button>
            </div>
            
    </div>
      

              
    </div>
    <div class="footer">
        <div class="footer-top">
          <li><a href=""><img src="images/dathongbao.jpg"></a></li>
          <li><a href=""></a> Liên hệ</li>
          <li><a href=""></a> Giới thiệu</li>
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