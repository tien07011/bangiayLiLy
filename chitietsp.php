<?php 
  include('Db/dbhelper.php');
  
  $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);
  $id_sp = $_REQUEST["id_sp"];
  $sql = "select * from san_pham where id_sp = $id_sp";
  $sp = executeSingleResult($sql);
//taikhoan
  if($user['roles']=='khách')
    {
        $sql = 'SELECT * FROM tai_khoan WHERE id_tk='.$user['id_tk'];
        
        $query = mysqli_query($con,$sql);
        $data  = mysqli_fetch_array($query);
        $id_tk = $data['id_tk'];

    }
//giohang
  
if($id_tk !="")
    {
       $sql1 = "select * from tai_khoan where id_tk = '$id_tk'";
       $data1 = executeSingleResult($sql1);
       $sql2 = "SELECT COUNT(bill.id_sp) as sl FROM bill WHERE bill.id_tk = $id_tk AND bill.status = 'TrongGio';";
       $datasl = executeSingleResult($sql2);
       }
       
    
    $sql = "select * from san_pham where id_sp = '$id_sp'";
  
    $data = executeSingleResult($sql);
   
//timkiem
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
    <script type="text/javascript">
      function tongtien()
      {
        var solg = document.getElementById("soluongdatmua").value;
        var allt = solg * "<?php echo $sp['gia']?>";

        document.getElementById("tongtien").innerHTML = allt +"₫" ;
      }
      function themgiohang(id_tk,id_sp)
      {
        console.log(id_tk,id_sp); 
        var solg = document.getElementById("soluongdatmua").value;
        if(solg>0)
        {
          $.post('./themgiohang.php',{'id_tk':id_tk,'id_sp':id_sp,'amount':solg},function(data)
          {
            if(data!="")
            {
              alert(data);
            }
            else
            {
              alert("Thêm thành công sản phẩm vào giỏ");
              location.reload();
            }
          });
        }
        else
        {
          alert("Bạn chưa chọn số lượng");
        }
      }
      function chualogin()
      {
        alert("Bạn chưa đăng nhập");
      }
    </script>
    <p id="id_tk" style="display: none;"><?php echo $id_tk; ?></p>
   <p id="id_sp" style="display: none;"><?php echo $id_sp; ?></p>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <div class="logo">
            <a href="home.php"><img src="images/LOGO.png"></a>
        </div>       
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button> <!-- thu phóng -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
           <div class="navbar-nav">
            <a class="nav-link" href="index_min.php?id_loai=1">GIÀY THỂ THAO</a>
            <a class="nav-link" href="index_min.php?id_loai=2">GIÀY CAO GÓT</a>
            <a class="nav-link" href="index_min.php?id_loai=3">SCANDAL</a>
            <a class="nav-link" href="index_min.php?id_loai=4">BOOT</a>
          </div>
          <div class="others">
             <form action="timkiem.php" method="Get" style="border:none;">
                <input style="text-align: center;float: left; border: none;border-bottom: 1px solid #333;" value="<?=$tim_kiem?>" name="tim_kiem" class="">
                <button style="border: none; background-color: #fff;height: 35px; width: 20px;"><i class="fas fa-search"></i></button>
              </form>
            <li><a href="dathang.php"><i class="fas fa-shopping-cart"></i></a></li>

             <li><a href="donhang.php"><i class="fas fa-file-invoice-dollar"></i></a></li>
          </div>
        </div>
        <?php if($user['roles']=='khách'){?>
            <li><a href="#"><i class="fas fa-user-circle"></i></li></a>
            <span class=""><?php echo $user['ten'] ?></span>
          <?php }?>
        <li><a href="logout.php" style="margin: 20px;"><i class="fas fa-sign-out-alt"></i></li></a>
      </div>
    </nav>

    <section>
        <div class="product">
         
          <div class="product-left" style="width: 40%;
  height: 100%;">
            <img src="images/<?php echo $sp['hinh_anh']; ?>" >
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
            <div class="ctsp_price" style="margin-top: 40px;">
                <p class="price">Số Lượng :</p>
                <input id="soluongdatmua"  style="margin-left: 10px;font-size: 15px; color: #231f20;text-align: center;width: 100px;" onchange="tongtien()" value="0" min="0" max="<?php echo $sp['so_luong']; ?>" type="number" name="so_luong">
            </div>
            <div class="ctsp_tinhtrang" style="margin-top: 40px;">
                <p style="margin-bottom: 5px;">Tình Trạng :</p>
                <span style="margin-left: 10px;font-size: 15px; color: #231f20;margin-top: -10px;"><?php if($sp['so_luong']>0){echo "Còn hàng";}else{echo "Hết hàng";} ?></span>
              </div>
              <div class="ctsp_tinhtrang" style="margin-top: 40px;">
                <p style="margin-bottom: 5px;">Tổng Tiền :</p>
                <span id="tongtien" style="margin-left: 10px;font-size: 20px; color: #f23333;margin-top: -10px;">0₫</span>
              </div>
          
            <div>
            <span >
              <button type="button" onclick="<?php if($id_tk!=""){echo "themgiohang(".$id_tk.",".$id_sp.")";}else{ echo "chualogin()";}?>"  style="padding: 10px; padding-left: 50px;padding-right: 50px;text-align: center;background-color: #231f20;color: #fff;border-radius: 4px;margin-top: 20px;margin-bottom: 20px;margin-left: 50px;animation: nhaylennhaylen .5s ease-out;">Thêm Vào Giỏ Hàng</button>
              
            </span>
            
            
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </body>
</html>