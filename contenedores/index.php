<?php
@session_start();
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
app = new \Slim\Slim();
app->config(array(
    'templates.path' => 'vistas',
));
app->contentType('text/html; charset=utf-8');
app->get('/', function() {
            echo "Pagina de gestión API REST de mi aplicación.";
        });
app->get('/status', function() {
            echo json_encode(array('status'=>'ok'));
        });
?>
