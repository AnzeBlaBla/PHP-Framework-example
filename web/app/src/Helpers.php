<?php

namespace Framework;

class Helpers
{
    private $specialFunctions = [];

    // Is set when a function was called
    // This one will actually be called when rendered
    private $functionToBeCalled = null;
    private $functionArgs = [];
    public function __callSpecialFunction($functionID, $args)
    {
        $this->functionToBeCalled = $functionID;
        $this->functionArgs = $args;
    }

    public SessionState $sessionState;
    public ?DBConnection $db;

    public function __construct($sessionState, $dbConnection)
    {
        $this->sessionState = $sessionState;
        $this->db = $dbConnection;
    }

    public function component($componentPath, $props = [], $key = null)
    {
        return new Component(require($componentPath), $this, $props, $key);
    }

    public function function($function)
    {
        $funcOwner = Component::$lastRendered;

        $newFuncID = count($this->specialFunctions) + 1 . '_' . $funcOwner->uniqueID;
        $newFunc = new SpecialFunction($function, $newFuncID);

        $this->specialFunctions[$newFuncID] = $newFunc;

        if ($this->functionToBeCalled == $newFuncID) {
            $this->functionToBeCalled = null;
            $args = $this->functionArgs;
            $this->functionArgs = [];

            // Mark component as updated
            Component::$lastRendered->markUpdated();
            
            $newFunc->call(...$args);

            
        }

        return $newFunc;
    }

    public function setUID($uid)
    {
        Component::$lastRendered->uniqueID = $uid;
    }

    public static function if($condition, $ifTrue, $ifFalse = '')
    {
        return $condition ? $ifTrue : $ifFalse;
    }

    public static function onsubmit($function)
    {
        return "event.preventDefault(); {$function}(getFormData(event.target));";
    }

    public static function redirect($url)
    {
        echo "<script>window.location.href = '$url'; console.log('redir to $url')</script>";
    }

    public static function reload()
    {
        return Helpers::redirect($_SERVER['REQUEST_URI']);
    }
}
