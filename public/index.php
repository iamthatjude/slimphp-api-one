<?php
/*
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response){
    $response->getBody()->write("Hello, Wordl!");
    return $response;
});

$app->run();
*/

/**
 * HELPER LINKS
 * - https://stackoverflow.com/questions/70637856/php-slim-exception-httpnotfoundexception-404-not-found-and-nothing-is-helping
 * - https://github.com/selective-php/basepath
 * - https://odan.github.io/2019/11/05/slim4-tutorial.html
 */

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/db.php';

$app = AppFactory::create();

// Add Slim routing middleware
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));

$app->addErrorMiddleware(true, true, true);

// Define app routes
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello");
    return $response;
})->setName('root');

// Run app
$app->run();