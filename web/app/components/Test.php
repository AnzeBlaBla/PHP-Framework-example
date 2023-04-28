<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    return <<<HTML
            <h3>Test component</h3>
            <p>I was told to display: {$this->props->text}</p>
            <p>I'm located at: {$this->treeLocation()}</p>
    HTML;
};
