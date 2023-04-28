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
            <h2>Auth</h2>

            <div id="login_form">
                {$h->component('components/Login')}
            </div>

            <div id="register_form" style="display: none">
                {$h->component('components/Register')}
            </div>

            <a href="#" onclick="switchAuthForm(); return false;" id="switch">Register</a>

            <script>
                function switchAuthForm() {
                    const loginForm = document.getElementById('login_form');
                    const registerForm = document.getElementById('register_form');
                    const switchLink = document.getElementById('switch');

                    if (loginForm.style.display === 'none') {
                        loginForm.style.display = 'block';
                        registerForm.style.display = 'none';
                        switchLink.innerText = 'Register';
                    } else {
                        loginForm.style.display = 'none';
                        registerForm.style.display = 'block';
                        switchLink.innerText = 'Login';
                    }
                }
            </script>


            
        </div>
    HTML;
};
