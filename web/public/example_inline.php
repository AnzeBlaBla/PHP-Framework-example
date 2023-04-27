<?php
require_once __DIR__ . '/../app/vendor/autoload.php';

use AnzeBlaBla\Framework\Framework, AnzeBlaBla\Framework\Helpers, AnzeBlaBla\Framework\Component, AnzeBlaBla\Framework\RenderMode;

//$c = new Component(require('components/Test.php'));
Framework::$renderMode = RenderMode::WebComponent;

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
    <?php
    $testvar = 'none';
    ?>

    <?= Helpers::$instance->component('components/Form', [
        'fields' => [
            [
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Name',
            ]
        ],
        'submit' => function ($data) use (&$testvar) {
            $testvar = $data['name'];
        }
    ]) ?>
    <p>Testvar: <?= $testvar ?></p>

</body>

</html>