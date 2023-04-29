<?php
require_once __DIR__ . '/../app/vendor/autoload.php';

use AnzeBlaBla\Framework\Framework, AnzeBlaBla\Framework\DBConnection;
use AnzeBlaBla\Framework\Helpers;

$db = new DBConnection('mysql:host=mysql;dbname=test', 'dev', 'dev');

$framework = new Framework(require('../app/App.php'), $db);
$framework->setComponentsRoot(__DIR__ . '/../app');


$apiRouter = $framework->getHelpers()->fileSystemRouter('api');
$apiRouter->setErrorRoute('error');
$apiRouter->setPrefix('/api');

$apiRouter->renderAPI();

$usersRouter = $framework->getHelpers()->fileSystemRouter('other_api');
$usersRouter->setErrorRoute('error');
$usersRouter->setPrefix('/api2');

$usersRouter->renderAPI();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <?= $framework->render() ?>
</body>

</html>