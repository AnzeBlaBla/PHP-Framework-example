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
            Test post page

            <p>User ID: {$this->props->query['user_id']}</p>
            <p>Post ID: {$this->props->query['post_id']}</p>
        </div>
    HTML;
};
