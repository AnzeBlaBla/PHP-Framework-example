<?php


// show only errors
error_reporting(E_ERROR);
/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */
return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    //return print_r($h->sessionState);

    $router = $h->fileSystemRouter('pages');
    $router->setErrorRoute('error');

    return <<<HTML
        <div>
            <h1>Test app</h1>

            {$h->if(
                $h->sessionState->loggedIn,
                $router,
                $h->component('components/Auth')
            )}
        </div>
    HTML;
};
