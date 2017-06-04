<?php
require('model/Database.php');
require('controller/Controller.php');
require ('model/model.php');
require ('model/cat.php');

$config = require('resources/config.php');
$db = new Database($config);
$controller = new Controller($db);
$controller->index();