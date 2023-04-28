<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */
return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    //return print_r($h->sessionState);

    /* $components = [];

    for ($i = 0; $i < 1000; $i++) {
        $components[] = $h->component('components/nest_test/B', [
            'data' => $i
        ]);
    } */
/*             {$h->map($components, function ($component) {
                return $component->render();
            })}
 */
    return <<<HTML
        <div>
            <h1>Test app</h1>

            <h2>Nest test</h2>


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

    /* return <<<HTML
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
    HTML; */
};
