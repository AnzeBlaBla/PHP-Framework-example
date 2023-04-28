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
        'item_id' => $this->props->query['item_id'],
        'data' => [
            'name' => 'test_item',
            'description' => 'test_item_description',
        ],
    ];
};
