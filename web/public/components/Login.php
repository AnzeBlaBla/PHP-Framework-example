<?php

/**
 * @param \Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \Framework\Component $this
     */

    $submit = function ($data) use ($h, &$message) {
        // If user exists
        $user = $h->db->queryOne('SELECT * FROM users WHERE name = ?', [
            $data['name']
        ]);
        $message = '';
        if ($user) {
            // If password is correct
            if ($user['password'] == $data['password']) {
                $h->sessionState->user = [
                    'name' => $data['name'],
                ];

                $h->sessionState->loggedIn = true;

                $h->reload();
            } else {
                $message = 'Incorrect password';
            }
        } else {
            // register
            $h->db->execute('INSERT INTO users (name, password) VALUES (?, ?)', [
                $data['name'],
                $data['password'],
            ]);

            $h->sessionState->user = [
                'name' => $data['name'],
            ];

            $h->sessionState->loggedIn = true;

            $h->reload();
        }
    };
    return <<<HTML
        <div>
            <h2>Login</h2>

            {$h->component('components/LoginForm', [
                'submit' => $submit,
            ])}

            {$h->if($message, "<p class='error'>{$message}</p>")}

            
            <style>
                .error {
                    color: red;
                }
            </style>
        </div>
    HTML;
};
