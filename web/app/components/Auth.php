<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    $this->data->view = 'login';

    $switchView = $h->function(function ($view) {
        $this->data->view = $view;
    });

    $nextView = $this->data->view == 'login' ? 'register' : 'login';

    return <<<HTML
        <div>
            <h2>Auth</h2>

            {$h->if($this->data->view == 'login', $h->component('components/Login'))}
            {$h->if($this->data->view == 'register', $h->component('components/Register'))}
            
            <button onclick="{$switchView}('{$nextView}')">{$nextView}</button>

        </div>
    HTML;
};
