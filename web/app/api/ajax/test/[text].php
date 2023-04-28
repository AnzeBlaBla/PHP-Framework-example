<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */
return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    return [
        'text'=> $this->props->query['text'],
        'html' => $h->component('components/Test', [
            'text' => $this->props->query['text']
        ])->render()
    ];
};
