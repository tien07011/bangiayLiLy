<?php
require_once('../../Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id_tk'])) {
					$id_tk = $_POST['id_tk'];

					$sql1 = 'update tai_khoan set trang_thai ="ngung" where id_tk = '.$id_tk;
					execute($sql1);
					$sql2='delete from bill where status= "TrongGio" and id_tk='.$id_tk;
					execute($sql2);

					
				}
				break;
		}
	}
}