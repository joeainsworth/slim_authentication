<?php

$db = parse_url(getenv("mysql://bebbea1d8baf7c:cd4159c1@us-cdbr-iron-east-04.cleardb.net/heroku_2fdf6c2b356d825?reconnect=true"));

return [
	'app' => [
		'url' => 'http://localhost',
		'hash' => [
			'algo' => PASSWORD_BCRYPT,
			'cost' => 10
		]
	],
	'db' => [
		'driver' => 'mysql',
		'host' => $db["host"],
		'name' => substr($db["path"], 1);,
		'username' => $db["user"],
		'password' => $db["pass"],
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => ''
	],
	'auth' => [
		'session' => 'user_id',
		'remember' => 'user_r'
	],
	'mail' => [
		'secret' => 'key-0e6ad7de6d3a6572e37138076fe93f56',
		'domain' => 'sandboxccbd346933974e83a94224a9095ffed3.mailgun.org',
		'from'   => 'joe.ainsworth@me.com'
	],
	'twig' => [
		'debug' => true
	],
	'csrf' => [
		'key' => 'csrf_token'
	]
];