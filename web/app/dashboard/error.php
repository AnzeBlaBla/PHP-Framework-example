<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */
return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    $h->status(404);
    
    return <<<HTML
        <div>
            Error route
        </div>
    HTML;
};
