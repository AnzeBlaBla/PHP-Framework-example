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
            B ({$this->treeLocation()})

        </div>
    HTML;
};
