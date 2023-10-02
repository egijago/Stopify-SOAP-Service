<?php

class pageRouter
{
    private $page;

    public function __construct($page)
    {
        $this->page = $this->isMatch($page);
    }

    public function isMatch($page)
    {
        if(file_exists("src/views/$page/index.php"))
        {
            echo "Matched";
            return $page;
        }
        else
        {
            echo "Not Matched";
            return "404";
        }
    }

    public function getPage()
    {
        require "src/views/$this->page/index.php";
    }
}