<?php
require_once('Db/dbhelper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idhd'])) {
					$idhd = $_POST['idhd'];

					$sql1 = 'delete from bill where idhd = '.$idhd;
					execute($sql1);

					
				}
				break;
		}
	}
}