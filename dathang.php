<?php
  include('Db/dbhelper.php') ;  
    
    
    $user = (isset($_SESSION['user'])? $user = $_SESSION['user']:[]);
    
    if(isset($user['username'])){
    
      $sql = "SELECT * FROM tai_khoan WHERE id_tk=".$user['id_tk'];
      $data1 = executeSingleResult($sql1);

      $sql2 = "SELECT COUNT(bill.id_sp) as sl FROM bill WHERE bill.status = 'TrongGio' AND bill.id_tk =".$user['id_tk'] ;
      $datasl = executeSingleResult($sql2);
    }
      $sqlgiohang =  "SELECT * FROM bill INNER JOIN san_pham ON bill.id_sp = san_pham.id_sp WHERE bill.status = 'TrongGio'  AND bill.id_tk =".$user['id_tk'];
      $datagiohang = executeResult($sqlgiohang);



      $tim_kiem = "";
      if(isset($_REQUEST['tim_kiem'])){
      $tim_kiem = $_REQUEST['tim_kiem'];}
      
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
  <script type="text/javascript">
      var list = [];
      var danhsach = [];
      function tinhtien(i)
      {

        if(document.getElementById("sp"+i).checked == true)
        {
          danhsach.push(i);
          let toanbotien = document.getElementById("toanbotien").innerHTML;
          let tienmoi = document.getElementById("tongtien"+i).innerHTML;
          document.getElementById("toanbotien").innerHTML =parseFloat(toanbotien) + parseFloat(tienmoi);
          
        } 
        else
        {
          danhsach.splice(danhsach.indexOf(i),1);
          let toanbotien = document.getElementById("toanbotien").innerHTML;
          let tienmoi = document.getElementById("tongtien"+i).innerHTML;
          document.getElementById("toanbotien").innerHTML = parseFloat(toanbotien) - parseFloat(tienmoi)
          
        }
      }
      function tienhangdathang()
      {
        if(danhsach == '')
        {
          alert('Bạn chưa chọn sản phẩm đặt hàng');
        } 
        else
        {
          $.post('./tienhanhdathang.php',{'danhsach':danhsach},function(data){location.reload();});
        }
      }
      function selectall()
      {
        if(document.getElementById("selectall").checked)
        {
          document.getElementById("toanbotien").innerHTML = "0";
          danhsach = list;
          list.forEach(element =>{
          document.getElementById("sp"+element).checked = true;
          let toanbotien = document.getElementById("toanbotien").innerHTML;
          let tienmoi = document.getElementById("tongtien"+ element).innerHTML;
          document.getElementById("toanbotien").innerHTML =parseFloat(toanbotien) + parseFloat(tienmoi);
          } );
          
        }
        else
        {
          danhsach = [];
          list.forEach(element => document.getElementById("sp"+ element).checked = false);
          document.getElementById("toanbotien").innerHTML = "0";
          
        }
      }
      
  </script>
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
            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>

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
  <style type="text/css">
    input:checked{
      background-color: #feaf37;
    }
  </style>
  <div class="container-fluid" style="height: 100px;"></div>
  <div class="container">
    <h1 style="margin-left: 40%;font-weight: bold;color: #000000cc;">ĐẶT HÀNG</h1>
  </div>  
  <div class="container">
    
  </div>
  <div class="container">           
      <table class="table table-hover">
        <thead>
            <tr>
              <th style="text-align: center;width: 50px;">CHỌN</th>
              <th style="text-align: center;">HÌNH ẢNH</th>
              <th style="text-align: center;">TÊN</th>
              <th style="text-align: center;">GIÁ</th>
              <th style="text-align: center;">SỐ LƯỢNG</th>
              <th width="110px">THAO TÁC</th>
              <th style="text-align: center;">TỔNG GIÁ</th>
            </tr>
        </thead>
        <tbody>
          <?php
          
           foreach ($datagiohang as $key) 
           {
            
            ?>
            <script type="text/javascript">
              list.push("<?php echo $key['idhd']; ?>");
            </script>
            <tr>
                <td style="text-align: center;"><input onclick="tinhtien(<?php echo $key['idhd']; ?>)" style="" type="checkbox" name="" id="sp<?php echo $key['idhd']; ?>"></td>
                <td style="width: 150px;height: 80px;"><img src="images/<?php echo $key['hinh_anh']; ?>" style="height: 100%;width: 50%;margin-left:15%;"></td>
                <td style="text-align: center;"><a href="chitietsp.php?id_sp=<?php echo $key['id_sp']; ?>"><?php echo $key['ten_sp']; ?></a></td>
                <td style="text-align: center; color: #f23333;"><?php echo number_format($key['gia']); ?></td>
                <td style="text-align: center;"><span style="border: 1px solid gray; border-radius: 50%;padding: 5px;padding-left: 9px;padding-right: 9px;"><?php echo $key['amount']; ?></span></td>
                <td>
                  <button class="btn btn-danger" onclick="deletesanpham(<?php echo $key['idhd']; ?>)">Xóa</button>
                </td>
                <td style="text-align: center; color: #f23333;"><span id="tongtien<?php echo $key['idhd']; ?>" style="color: #f23333;display: none;"><?php echo $key['totalmoney']; ?></span><span  style="color: #f23333;"><?php echo number_format($key['totalmoney']); ?></span>₫</td>

              </tr>
            <?php
            
           }
          ?>
            
            <tr>
              <td colspan="6">
                <input style="margin-right: 10px;" id="selectall" type="checkbox" name="" onclick="selectall()" ><span>Chọn Tất Cả</span>
              </td>
            </tr>
            <tr>
              <td colspan="3">TỔNG TIỀN ĐÃ CHỌN</td>
              <td colspan="3" style="text-align: right;font-size: 20px;color: #f23333;"><span id="toanbotien" style="text-align: right;font-size: 20px;color: #f23333;">0</span>₫</td>
            </tr>
            
        </tbody>
      </table>
  </div>
  <div class="container">
    <div class="dathang">
      <button style="padding: 10px; padding-left: 50px;padding-right: 50px;text-align: center;background-color: #231f20;color: #fff;border-radius: 4px;margin-top: 20px;margin-bottom: 20px;margin-left: 50px;" type="button" onclick="tienhangdathang()">Đặt Hàng</button>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="Assets/Js/toggle.js" async defer></script>
        <script type="text/javascript">
            function deletesanpham(idhd) {
                var option = confirm("Bạn có chắc muốn xóa danh mục này không?")
                if (!option) {
                    return;
                }
                $.post('ajax.php',
                {
                    'idhd' : idhd,
                    'action': 'delete'
                },function (data) {
                    location.reload()
                })
            }
        </script>
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