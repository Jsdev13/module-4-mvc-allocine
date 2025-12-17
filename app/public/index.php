<?php
require_once(__DIR__ . '/../core/router.php');

$bdd = new PDO("mysql:host=bdd;dbname=app-database;charset=utf8", "root", "root");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$router = new Router($bdd); //  on passe la BDD ici

$controllerName = $_GET['controller'] ?? 'FILM';
$controller = $router->getController($controllerName);

$action = $_GET['action'] ?? 'list';
$controller->$action();
$controller->create();


