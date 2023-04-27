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
            <style>
                h1 {
                    color: blue;
                }
            </style>

            <h1>Test blue</h1>
        </div>
    HTML;
};
