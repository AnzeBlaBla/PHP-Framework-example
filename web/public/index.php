<?php
require_once __DIR__ . '/../app/src/autoload.php';

use Framework\Framework, Framework\DBConnection;

$db = new DBConnection('mysql:host=mysql;dbname=test', 'dev', 'dev');

$framework = new Framework(require('App.php'), $db);

$framework->render();