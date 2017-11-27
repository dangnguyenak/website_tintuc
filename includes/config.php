<?php
	/*
	* Database connection info
	*/
	$tlca_data = array();
	$tlca_data['server'] = 'localhost';
	$tlca_data['dbuser'] = 'root';
	$tlca_data['dbpassword'] = '';
	$tlca_data['dbname'] = 'news2';
	date_default_timezone_set('Asia/Saigon');
	 //Connect
	$connectionDb = mysqli_connect($tlca_data['server'],$tlca_data['dbuser'],$tlca_data['dbpassword'],$tlca_data['dbname']);

    mysqli_set_charset($connectionDb, 'UTF8');
	// Template config

    session_start();
	@define(skin_name,'skin'); 
	@define(skin_ext,'.tpl'); 
