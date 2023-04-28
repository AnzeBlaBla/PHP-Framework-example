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
            Test item page

            <p>User ID: {$this->props->query['user_id']}</p>
            <p>Item ID: {$this->props->query['item_id']}</p>
        </div>
    HTML;
};
