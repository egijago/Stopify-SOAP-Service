<?php

class PageRouter
{
    private $page;
    private $router;
    private $method;
    private $params=[];

    public function __construct($page)
    {
        $parsedUrl = parse_url($page);

        $pathParts = explode('/', trim($parsedUrl['path'], '/'));
        $this->page = $pathParts[0];
        if(isset($pathParts[1])){
            $this->method = $pathParts[1];
        }

        if(isset($parsedUrl['query'])){
            parse_str($parsedUrl['query'], $this->params);
        }
        
    }

    public function isMatch($page)
    {
        return (file_exists("src/views/$page/index.php"));
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getPage()
    {
        
        if ($this->isMatch($this->page)) 
        {
            require_once "src/views/$this->page/index.php";
        } 
        else if ($this->page == "") 
        {
            require_once "src/views/home/index.php";
        }
        else if ($this->page == "api" || $this->page = "element")
        {
            require_once "src/api/index.php";
        }
        else 
        {
            require_once "src/views/404/index.php";
        }
    }
}