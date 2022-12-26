<?php
require_once('../../Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id_sp'])) {
					$id_sp = $_POST['id_sp'];

					$sql1 = 'update san_pham set trang_thai ="ngungban" where id_sp = '.$id_sp;
					execute($sql1);

					$sql2='delete from bill where status= "TrongGio" and id_sp='.$id_sp;
					execute($sql2);
				}
				break;
		}
	}
}