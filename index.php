<?php

require 'vendor/autoload.php';

function playDice ($dice) {
    switch ($dice) {
        case "d4":
            return rand(1,4);
            break;
        case "d6":
            return rand(1,6);
            break;
        case "d8":
            return rand(1,8);
            break;
        case "d10":
            return rand(1,10);
            break;
        case "d12":
            return rand(1,12);
            break;
        case "d20":
            return rand(1,20);
            break;
        default :
            return null;
            break;
    }
}

$app = new \Slim\App();


$app->get('/', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args){
    $response->getBody()->write('Olá, experimente usar o link <a href="/play/d6">Rolar um D6</a><br>');
    return $response;
});

$app->get('/play/{dice}', function (\Slim\Http\Request $request, \Slim\Http\Response $response, array $args){

    $dice = $args['dice'];
    $resultado = playDice($dice);
    $json = json_encode(array('dado' => $dice, 'resultado' => $resultado));
    $response->getBody()->write($json);
    return $response;
});

$app->run();
