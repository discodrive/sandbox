<?php

namespace Basetheme;

class News extends \Substrakt\Platypus\Post 
{

    /**
     * Get the post masthead
     * @return object \Basetheme\Masthead
     */
    public function masthead(): \Basetheme\Masthead
    {
        return new \Basetheme\Masthead($this->wp);
    }

}