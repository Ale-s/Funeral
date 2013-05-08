<?php

// Global config
$config = array(

	// App domain
	'domain' => NULL,

	// App folder
	'folder' => NULL,

	// Database
	'database' => array(
		'server'   => 'localhost',
		'user'     => NULL,
		'password' => NULL,
		'name' => NULL,
	),

	'default_controller' => 'home',

	'default_action' => 'index',

);

// Include local config
if (file_exists(APP_PATH . 'config/config.local.php')) {
	@include_once APP_PATH . 'config/config.local.php';
}