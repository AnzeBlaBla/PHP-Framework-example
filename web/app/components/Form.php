<?php

/**
 * @param \AnzeBlaBla\Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \AnzeBlaBla\Framework\Component $this
     */
    return <<<HTML
            <form onsubmit="{$h->onsubmit($h->function($this->props->submit))}">
            {$h->map($this->props->fields, function ($field) use ($h) {
                return <<<HTML
                    <input type="{$field['type']}" name="{$field['name']}" placeholder="{$field['placeholder']}">
                HTML;
            })}
                <input type="submit" value="Submit">
            </form>
            {$this->treeLocation()}
    HTML;
};
