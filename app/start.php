<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Mailgun\Mailgun;
use Http\Adapter\Guzzle6;

use Noodlehaus\Config;
use RandomLib\Factory as RandomLib;

use Website\User\User;
use Website\Mail\Mailer;
use Website\Helpers\Hash;
use Website\Validation\Validator;

use Website\Middleware\CsrfMiddleware;
use Website\Middleware\BeforeMiddleware;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require_once INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
	'mode' => file_get_contents(INC_ROOT . '/mode.php'),
	'view' => new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->add(new BeforeMiddleware);
$app->add(new CsrfMiddleware);

$app->configureMode($app->config('mode'), function() use ($app) {
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'filters.php';
require 'routes.php';

$app->auth = false;

$app->container->set('user', function() {
	return new User;
});

$app->container->singleton('hash', function() use($app) {
	return new Hash($app->config);
});

$app->container->singleton('validation', function() use($app) {
	return new Validator($app->user);
});

$app->get('/', function() use ($app) {
	$app->render('home.php');
});

$app->container->singleton('mail', function() use($app) {
	$client = new \Http\Adapter\Guzzle6\Client();
	$mailgun = new Mailgun($app->config->get('mail.secret'), $client);

	// Return mailer object
	return new Mailer($app->view, $app->config, $mailgun);
});

$app->container->singleton('randomlib', function() {
	$factory = new RandomLib;
	return $factory->getMediumStrengthGenerator();
});

$view = $app->view();

$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
	new TwigExtension
];