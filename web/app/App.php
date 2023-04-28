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

    

    return <<<HTML
        <div>
            <h1>Test app</h1>

            <h2>Nest test</h2>
            {$h->component('components/nest_test/A')}

            {$h->if(
                $h->sessionState->loggedIn,
                function () use ($h) {
                    $dashRouter = $h->fileSystemRouter('dashboard');
                    $dashRouter->setErrorRoute('error');

                    return $dashRouter->render();
                },
                $h->component('components/Auth')
            )}
        </div>
    HTML;
};
