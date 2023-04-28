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
            A {$this->treeLocation()}

            <div>
                {$h->component('components/nest_test/B')}
                {$h->component('components/nest_test/C')}
            </div>
        </div>
    HTML;
};
