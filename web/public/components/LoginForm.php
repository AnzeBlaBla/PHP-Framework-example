<?php

/**
 * @param \Framework\Helpers $h
 */

return function ($h) {
    /**
     * @var \Framework\Component $this
     */
    return <<<HTML
            <form onsubmit="{$h->onsubmit($h->function($this->props->submit))}">
                <input type="text" name="name" placeholder="Name">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Submit">
            </form>


            {$this->treeLocation()}
    HTML;
};
