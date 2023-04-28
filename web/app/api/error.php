<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */
return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    $h->status(404);
    return [
        'error' => true,
        'message' => 'Route not found',
    ];
};
