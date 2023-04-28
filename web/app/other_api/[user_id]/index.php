<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */
return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    return [
        'user_id' => $this->props->query['user_id'],
        'name' => 'test_user',
    ];
};
