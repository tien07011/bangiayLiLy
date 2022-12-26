<?php
	include('Db/dbhelper.php');
	$id_tk = $_POST['id_tk'];
	$id_sp = $_POST['id_sp'];
	$amount = $_POST['amount'];
	$sql = "select * from tai_khoan where id_tk = $id_tk"; 
	$data = executeSingleResult($sql);
	$dulieu['idhd'] = "";
	$dulieu['id_tk'] = $id_tk;
	$dulieu['id_sp'] = $id_sp;
	$dulieu['totalmoney'] = "";
	$dulieu['timeorder'] = "now()";
	$dulieu['amount'] = $amount;
	$dulieu['deliveryaddress'] = $data['address'];
	$dulieu['status'] = "TrongGio";
	
	
	$table = "bill";
	
	$sql2 = "select so_luong from san_pham where id_sp = $id_sp";
	$sl=executeSingleResult($sql2)['so_luong']-$amount;
	
	if($sl>=0)
	{
		// $insert=data_to_sql_insert($table,$dulieu);

		execute(data_to_sql_insert($table,$dulieu));
		//execute("UPDATE san_pham set so_luong = $sl where id_sp = $id_sp");
		execute("UPDATE bill INNER JOIN san_pham on bill.id_sp = san_pham.id_sp set bill.totalmoney = bill.amount * san_pham.gia");
	}
	else
	{
		echo "Số lượng mặt hàng không đủ số lượng trong kho còn ".executeSingleResult($sql2)['so_luong'];
	}
	
?>