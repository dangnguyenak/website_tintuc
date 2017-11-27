<?php

	$tlca_data = array();
	$tlca_data['server'] = 'localhost';
	$tlca_data['dbuser'] = 'netdepcu_ttol';
	$tlca_data['dbpassword'] = '=-kieUtaM#';
	$tlca_data['dbname'] = 'netdepcu_ttol';
	date_default_timezone_set('Asia/Saigon');
	 //Connect 
	$tlca_connect_db = mysqli_connect($tlca_data['server'],$tlca_data['dbuser'],$tlca_data['dbpassword']);
	mysqli_select_db($tlca_data['dbname'], $tlca_connect_db);	
