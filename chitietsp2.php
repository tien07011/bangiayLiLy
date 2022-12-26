<?php 
  include('Db/dbhelper.php');
  $id_sp = $_REQUEST["id_sp"];
  $sql = "select * from san_pham where id_sp = $id_sp";
  $sp = executeSingleResult($sql);

  $tim_kiem = "";
  if(isset($_REQUEST['tim_kiem'])){
  $tim_kiem = $_REQUEST['tim_kiem'];}
?>
<!doctype html>
<html lang="en">
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
             <form action="timkiem2.php" method="Get" style="border:none;">
                <input style="text-align: center;float: left; border: none;border-bottom: 1px solid #333;" value="<?=$tim_kiem?>" name="tim_kiem" class="">
                <button style="border: none; background-color: #fff;height: 35px; width: 20px;"><i class="fas fa-search"></i></button>
              </form>
             <li><i class="fas fa-shopping-cart"></i></li>
             <li><a href=""><i class="fas fa-file-invoice-dollar"></i></a></li>
          </div>
        </div>
        <li><a href="login.php"><i class="fas fa-user-circle"></i></li></a>
      </div>
    </nav>

    <section>
        <div class="product">
          <div class="product-left" style="width: 40%;
  height: 100%;">
            <img src="images/<?php echo $sp['hinh_anh']; ?>">
          </div>
          <div class="product-right">
            <h2><?php echo $sp['ten_sp']; ?></h2>
            <p class="price">
              <span><?php echo $sp['gia']; ?> VNĐ</span>
            </p>
            <p class="price">
              <span>Thương hiệu: <?php echo $sp['thuong_hieu']; ?></span>
            </p>
            <p class="price">
              <span>Màu sắc: <?php echo $sp['mau']; ?></span>
            </p>
            <div class="ctsp_tinhtrang" style="margin-top: 40px;">
                <p style="margin-bottom: 5px;">Tình Trạng :</p>
                <span style="margin-left: 10px;font-size: 15px; color: #231f20;margin-top: -10px;"><?php if($sp['so_luong']>0){echo "Còn hàng";}else{echo "Hết hàng";} ?></span>
              </div>
            <div class="action">
              <button type="button" onclick="alert('Vui lòng đăng nhập!')"  style="padding: 10px; padding-left: 50px;padding-right: 50px;text-align: center;background-color: #231f20;color: #fff;border-radius: 4px;margin-top: 20px;margin-bottom: 20px;margin-left: 50px;">Thêm Vào Giỏ Hàng</button>
            </div>
          </div>
        </div>

    </section>


    <div class="footer ">
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