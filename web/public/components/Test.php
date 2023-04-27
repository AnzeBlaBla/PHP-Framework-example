<?php

/**
 * @param \Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \Framework\Component $this
     */
    $color = $this->props->color ?? 'blue';
    return <<<HTML
        <div>
            <style>
                h1 {
                    color: {$color};
                }
            </style>

            <h1>Test $color</h1>
        </div>
    HTML;
};
