<?php

/**
 * @param \Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \Framework\Component $this
     */

    $submit = $h->function(function ($data) use ($h, &$message) {
        // If user exists
        $user = $h->db->queryOne('SELECT * FROM users WHERE name = ?', [
            $data['name']
        ]);

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
    });
    return <<<HTML
        <div>
            <h2>Login</h2>

            <form onsubmit="{$h->onsubmit($submit)}">
                <input type="text" name="name" placeholder="Name">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Submit">
            </form>

            <p>{$message}</p>

            <style>
                h1 {
                    color: red;
                }
            </style>
        </div>
    HTML;
};
