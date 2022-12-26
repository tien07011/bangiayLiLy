<?php
	include('../Db/dbhelper.php');
	$date = isset($_POST['date'])?$_POST['date']:"";
	$date1 = isset($_POST['date1'])?$_POST['date1']:"";
	if($date != "")
	{
		$time = strtotime($date); 
		$year = date('Y',$time);
		$month = date('m',$time);
		$day = date('d',$time);
		$sql = "SELECT Sum(totalmoney) as tongtien FROM bill WHERE year(timeorder) = $year and month(timeorder) = $month and day(timeorder) = $day and status = 'DaDat'";
		$data = executeSingleResult($sql);
		echo number_format($data['tongtien']);
	}
	else
	{
		$time = strtotime($date1); 
		$year = date('Y',$time);
		$month = date('m',$time);
		$day = date('d',$time);
		$sql = "SELECT Sum(totalmoney) as tongtien FROM bill WHERE year(timeorder) = $year and month(timeorder) = $month and status = 'DaDat'";
		$data = executeSingleResult($sql);
		echo number_format($data['tongtien']);
	}
?>