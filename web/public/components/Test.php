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
        </div>
    HTML;
};
