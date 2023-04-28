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
            C ({$this->treeLocation()})

            {$h->component('components/nest_test/B')}
            {$h->component('components/nest_test/B')}

        </div>
    HTML;
};
