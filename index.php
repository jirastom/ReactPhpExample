<?php
	require 'vendor/autoload.php';

	$loop = React\EventLoop\Factory::create();
    $socket = new React\Socket\Server($loop);
    $http = new React\Http\Server($socket);

    $entityService = new React\Http\Entity\EntityService($loop);
    $entityController = new React\Http\Entity\EntityController($entityService);

    $http->on('request', function ($request, $response) use ($entityController) {

        $controllerResponse = $entityController->handleRequest($request);

        $response->writeHead($controllerResponse['code'], array('Content-Type' => 'text/plain'));
        $response->end($controllerResponse['status']);

    });

    $socket->listen(1337);
    $loop->run();
