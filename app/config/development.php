<?php

$db = parse_url(getenv("mysql://bcd7123eb562f7:7d4b6ab9@us-cdbr-iron-east-04.cleardb.net/heroku_4c86efe8ad5db53?reconnect=true"));

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
		'name' => substr($db["path"], 1),
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