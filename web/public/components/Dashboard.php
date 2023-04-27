<?php

/**
 * @param \Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \Framework\Component $this
     */

    return <<<HTML
        <div>
            <h2>Dashboard</h2>

            <p>Name: {$h->sessionState->user['name']}</p>

            <button onclick="{$h->function(function () use ($h) {
                $h->sessionState->loggedIn = false;
                $h->reload();
            })}()">Logout</button>

        </div>
    HTML;
};
