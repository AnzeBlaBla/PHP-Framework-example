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
            $message = 'User already exists';
        } else {
            if ($data['password'] != $data['password2']) {
                $message = 'Passwords do not match';
                return;
            }
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
            <h2>Register</h2>

            {$h->component('components/Form', [
                "fields" => [
                    [
                        "name" => "name",
                        "type" => "text",
                        "placeholder" => "Name",
                    ],
                    [
                        "name" => "password",
                        "type" => "password",
                        "placeholder" => "Password",
                    ],
                    [
                        "name" => "password2",
                        "type" => "password",
                        "placeholder" => "Repeat password",
                    ]
                ],
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
