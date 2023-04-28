<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */

    return <<<HTML
        <div>
            <h2>Dashboard</h2>

            <p>Name: {$h->sessionState->user['name']}</p>

            <div style="margin-left: 20px">
                {$h->component('components/Test', [
                    'text' => 'Test text'
                ])}
            </div>

            <div id="ajax-target" style="background: #ccc"></div>


            <input type="text" id="ajax-input" value="test">
            <button onclick="loadAjax()">Load AJAX</button>
            <script>
                function loadAjax()
                {
                    const input = encodeURIComponent(document.getElementById('ajax-input').value);
                
                    fetch('/api/ajax/test/' + input, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('ajax-target').innerHTML = data.html;
                            console.log("Data:", data)
                        });
                }
            </script>

            <button onclick="{$h->function(function () use ($h) {
                $h->sessionState->loggedIn = false;
                $h->reload();
            })}()">Logout</button>


        </div>
    HTML;
};
