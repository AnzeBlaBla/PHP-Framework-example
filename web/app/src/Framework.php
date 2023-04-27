<?php

namespace Framework;

class Framework
{
    private $rootComponent;
    private $helpers;
    private SessionState $sessionState;
    private ?DBConnection $dbConnection;
    private $projectRoot;

    public function __construct($renderFunction, $dbConnection = null)
    {
        $this->sessionState = new SessionState('Framework');

        $backtrace = debug_backtrace();
        $this->projectRoot = dirname($backtrace[0]['file']);
        $this->helpers = new Helpers($this->sessionState, $dbConnection, $this->projectRoot);

        $this->dbConnection = $dbConnection;


        $this->handleRequestData();

        $this->rootComponent = new Component($renderFunction, $this->helpers);
    }

    private function handleRequestData()
    {
        // Data is either raw JSON or post data where the data field is the json
        $json = $_POST['data'] ?? file_get_contents('php://input');
        $requestData = json_decode($json, true);

        if (isset($requestData['action'])) {
            $action = $requestData['action'];

            switch ($action) {
                case 'callSpecialFunction':
                    $this->helpers->__callSpecialFunction($requestData['specialFunctionID'], $requestData['args']);
                    break;
            }
        }
    }

    public function render()
    {
        echo $this->renderFrontendDependencies();
        echo $this->rootComponent->render();
    }

    private function renderFrontendDependencies()
    {
        include(__DIR__ . '/frontend.php');
    }
}
