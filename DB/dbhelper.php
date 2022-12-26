<?php
include('config.php');

function execute($sql) {
	//save data into table
	// open connection to database
	// $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$con = mysqli_connect('localhost', 'root','', 'giaylily');
	//insert, update, delete
	mysqli_query($con, $sql);

	//close connection
	mysqli_close($con);
}

function executeResult($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect('localhost', 'root','', 'giaylily');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}

	//close connection
	mysqli_close($con);

	return $data;
}
// function Result($sql)
// {
// 	//save data into table
// 	// open connection to database
// 	$con = mysqli_connect('localhost', 'root','', 'giaylily');
// 	//insert, update, delete
// 	$result = mysqli_query($con, $sql);
// 	mysqli_close($con);

// 	return $result;
// }

function executeSingleResult($sql) {
	//save data into table
	// open connection to database
	// $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$con = mysqli_connect('localhost', 'root','', 'giaylily');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($con);

	return $row;
}

function exec_select($sql){
	logDebug("sql=[$sql]");//de fix bug
	
	global $link;
	$ret = isset($ret) ? $ret : array();
	//$res = mysqli_query($link,$sql) ;
	$res = $link->query($sql);
	$row = array();
	//Lay loi sau khi thuc hien truy van
	$err = mysqli_error($link);
	//kiem tra
	if ($err){
		print("Khong the select duoc");
		logDebug("Khong the select duoc,ERROR=[" . $err . "]" );
		logDebug(  "COUNT=[0]" );
		return null;
	}
	//Khong co loi
	if ($res ){
		$i = 1;
		//lay tung dong ket qua
		//while( $row = mysqli_fetch_array($res,MYSQL_ASSOC) )
		while( $row = $res->fetch_array(MYSQLI_ASSOC) )
		{				
			$ret[]= $row ;
		}
		//mysql_free_result($res);
		$res->free_result();
	}	
	close();
	return $ret;
}
function exec_update($sql){
	logDebug( "<!-- sql=[$sql] -->");//de fix bug
	
	global $link;
	//$res = mysqli_query($link,$sql) ;
	$res = $link->query($sql);
	$row = array();
	//Lay loi sau khi thuc hien truy van
	$err = mysqli_error($link);
	//$err = $link->error();
	//kiem tra
	if ($err){
		print("Khong thể select duoc,ERROR=[" . $err . "]" );
		print(  "COUNT=[0]" );
		return -1;
	}
	//$ret = mysqli_affected_rows();
	//$ret = $res->affected_rows();
	close();
	return 1;
}
function sql_str($val){
	if($val === 0)  return '0' ;
	if($val === null) {
		return 'NULL';
	}
	global $link;
	if(!$link) connect();
	if (get_magic_quotes_gpc()) {
		return "" . mysqli_real_escape_string($link,stripslashes($val)) . "" ;
	}
	return "" . mysqli_real_escape_string($link,$val)  . "" ;
}
function data_to_sql_insert($tbl,$data){
	if (!$tbl || !$data) return "";
	$fields = array();
	$vals = array();
	foreach ($data as $k=>$v){
		$fields[] = $k;
		$vals[] = "'" . $v . "'";
	}
	$fields = implode(",",$fields);
	$vals = implode(",",$vals);
	return "insert into {$tbl} ({$fields}) values ({$vals})";
}
function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Ho_Chi_Minh');
    //date_default_timezone_set('Vietnam/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}