<?php 
  include('Db/dbhelper.php');
  if(isset($_POST['ten_dn']))
  {
    $ten_dn = $_POST['ten_dn'];
    $mk = $_POST['mk'];
    $sql = "SELECT * FROM tai_khoan WHERE trang_thai='hoatdong' and tai_khoan.ten_dn ='$ten_dn'";
    echo($sql);
    $query = mysqli_query($con,$sql);
    $data  = mysqli_fetch_array($query);
    $checkUsername = mysqli_num_rows($query);
    if($checkUsername == 1)
    {

      if($data['mk']== $mk){
        //lưu vào session
        $_SESSION['user']= $data;
        if($data['roles']=='admin'){
            header('location: admin/index.php');
        }
        else if($data['roles']=='khách'){
            header('location: home.php');
        }
        
      }
      else{
        echo "<script>alert('Bạn đã sai nhập mật khẩu');</script>";
      }
    }
    else{
      echo "<script>alert('Username không tồn tại');</script>";
    }

    
  }
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <style>
            body {  
                background-image: white;
                padding: 20px;
            }
            .frame{
                left: 50%; 
                top: 50%; 
                position: absolute;
                transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);
            }
            .frame,.input-group,button{  
                border: 1px solid rgb(200, 200, 200);   
                box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px; 
                background: rgba(200, 200, 200, 0.1);   
                border-radius: 4px;
                height: auto;
            }
            .form-group button{
                width: auto;
            }
            .logo{
                float: left;
               
            }
            .content{
                float:left;
            }
            h4 {    
                font-size: 2.2vw;
                padding-top: 1vw;
                text-align: center;  
                color: #3289a8;
            }
            .form-group{
                padding-right: 3vw;
                padding-left: 3vw;
                padding-top: 1vw;
                padding-bottom: 0.3vw;
            }
            .support-information p{
                font-size: 10px;   
            }
            .support-information{
                margin: 8.5vw auto 0 0;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid"> 
            <div class="row-fluid">
                <div class="frame ">
                    <div class="col-md-6 " id="box">
                        <div class="logo" ><img src="Assets/Image/logo_login.png" class="img-fluid" style="width: 370px; height:500px"></div>
                    </div>
                    <div class=" col-md-6 content" id="box">
                        <div class="title d-none d-sm-block">
                            <a href="home2.php" style="text-decoration: none;"><h4>GIÀY LILY</h4><hr></a>
                        </div>
                        <form class="row" action="#" method="post" id="login_form" >
                            <div class="form-group"> 
                                <div class="col-md"> 
                                    <div class="input-group"> 
                                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span> 
                                        <input name="ten_dn" placeholder="Username" class="form-control" type="text" id="ten_dn" > 
                                    </div>
                                </div> 
                            </div> 
                            <div class="form-group"> 
                                <div class="col-md-12"> 
                                    <div class="input-group"> 
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input name="mk" placeholder="Password" class="form-control" type="password" id="mk"> 
                                    </div>
                                </div> 
                            </div>
                            <div class="form-group"> 
                                <div class="button-login col-md-12 d-flex align-items-end justify-content-center"> 
                                    <button type="submit" class="btn btn-danger " name="login" >Đăng nhập </button> 
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="button-dangky col-md-12 d-flex align-items-end justify-content-center"> 
                                    <a href="dangky.php" style="text-decoration:none;">Đăng ký ngay ! </a>
                                </div>
                            </div>
                        </form>
                        <div class="support-information text-center d-none d-xl-block">
                            <p>© CÔNG TY CỔ PHẦN SX VÀ XNK HNC</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>