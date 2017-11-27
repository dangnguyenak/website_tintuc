<?php
    //error_reporting(0);
	// Config
    require_once ("config.php");

	// class gold ly
	include(dirname(__FILE__).'/classes/manage.php');

	// Class manage Variable
	$systemAction = new manage();

	// Template Variable
	$systemSkin = $systemAction->skin;
	$class_member = $systemAction->load('class_member');
	$class_member->check_login();
