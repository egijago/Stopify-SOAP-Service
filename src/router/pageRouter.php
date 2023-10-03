<?php

class PageRouter
{
    private $page;
    // private $method;
    // private $params;

    public function __construct($page)
    {
        $parsedUrl = parse_url($page);
        $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
        $this->page = $pathSegments[0];
        // $this->method = $pathSegments[1];
        // parse_str($parsedUrl['query'], $params);
        // $this->params = $params;
    }

    public function isMatch($page)
    {
        if (file_exists("src/views/$page/index.php")) {
            return true;
        } else {
            return false;
        }
    }

    public function getPage()
    {
        if ($this->isMatch($this->page)) {
            require_once "src/views/$this->page/index.php";
        } else {
            require_once "src/views/404/index.php";
        }
    }
}