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
        return (file_exists(__DIR__ . "/../views/$page/index.php"));
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getPage()
    {
        if(isset($_SESSION["username"]))
        {
            if ($this->isMatch($this->page) && $this->page != "register" && $this->page != "login") 
            {
                // echo base_page
                // diisi berdasarkan response dari controller

                require_once __DIR__ . "/../views/$this->page/index.php" ;
                // music(params)
            } 
            else if ($this->page == "") 
            {
                require_once __DIR__ . "/../views/home/index.php";
            }
            else if ($this->page == "api" || $this->page = "element")
            {
                require_once __DIR__ . "/../api/index.php";
            }
            else 
            {
                require_once __DIR__ . "/../views/404/index.php";
            }
        }
        else
        {
            if ($this->page == "api")
            {
                require_once __DIR__ . "/../api/index.php";
            }
            else if($this->page == "register")
            {
                require_once __DIR__ . "/../views/register/index.php";
            }
            else if($this->page == "login")
            {
                require_once __DIR__ . "/../views/login/index.php";
            }
            else 
            {
                require_once __DIR__ . "/../views/404/index.php";
            }
        }
    }
}