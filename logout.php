<?php 
include('../Db/dbhelper.php');
//xoá session theo tên
unset($_SESSION['user']);
//xoá tất cả các session
session_destroy();
header('location: home2.php');
?>