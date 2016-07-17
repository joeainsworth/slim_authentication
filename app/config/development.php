<?php

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
		'host' => '127.0.0.1',
		'name' => 'site',
		'username' => 'root',
		'password' => 'm1lkw00d',
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