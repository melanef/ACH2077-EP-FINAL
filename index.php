<?php declare(strict_types=1);

include 'vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

// map a route
$router->map('GET', '/', function (ServerRequestInterface $request) : ResponseInterface {
    $response = new Zend\Diactoros\Response;
    $response->getBody()->write(file_get_contents('views/index.html'));
    return $response;
});

$response = $router->dispatch($request);

// send the response to the browser
(new Zend\Diactoros\Response\SapiEmitter)->emit($response);