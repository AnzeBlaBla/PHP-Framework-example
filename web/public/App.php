<?php

/**
 * @param \Framework\Helpers $h
 */

use PHP_CodeSniffer\Generators\HTML;

// show only errors
error_reporting(E_ERROR);

return function ($h) {
    /**
     * @var \Framework\Component $this
     */
    //return print_r($h->sessionState);
    return <<<HTML
        <div>
            <h1>Test app</h1>

            {$h->if(
                $h->sessionState->loggedIn,
                $h->component('components/Dashboard.php'),
                $h->component('components/Login.php')
            )}

            {$h->component('components/Test.php')}
        </div>
    HTML;
};
