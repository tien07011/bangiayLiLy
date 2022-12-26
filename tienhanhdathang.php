<?php
	include('Db/dbhelper.php');
	$data = $_POST['danhsach'];
	foreach ($data as $key) 
	{
		$sql = "update bill set status = 'DaDat' , timeorder = now() where idhd = $key";

		execute($sql);
		$sql4 = "select * from bill where idhd = $key";
		$dt=execute($sql4);
		$amount=$dt['amount'];
		$id_sp=$dt['id_sp'];
	$sql2 = "select so_luong from san_pham where id_sp = $id_sp";
	$sl=executeSingleResult($sql2)['so_luong']-$amount;
	execute(data_to_sql_insert($table,$dulieu));
		execute("UPDATE san_pham set so_luong = $sl where id_sp = $id_sp");


		//  $sql1 ="select * from bill where bill.iddh= $key";
		//  $data1 = executeResult($sql1);
		// // console.log($data1);
		//  $id_sp=$data1['id_sp'];
		//  $amount=$data1['amount']
		//  $sql2 = "select so_luong from san_pham where id_sp = $id_sp";
		//  $sl=executeSingleResult($sql2)['so_luong']-$amount;
		//  $sql3="UPDATE san_pham set so_luong = $sl where id_sp = $id_sp");
		//  execute($sql3);
			
		
	// 	$sql1 = "select * from bill where iddh= $key"; 
	// 	execute($sql1);
	// 	$data1 = executeResult($sql1);
	// 	$id_sp = $_POST['id_sp'];
	// $amount = $_POST['amount'];
		
	// 	$sql2 = "select so_luong from san_pham where id_sp = $id_sp";
	// 	$id_sp=$data1['id_sp'];
	// 	$sl=executeSingleResult($sql2)['so_luong']-$amount;
	
		
		
	// 	execute("UPDATE san_pham set so_luong = $sl where id_sp = $id_sp");
		
	
	

	}
?>