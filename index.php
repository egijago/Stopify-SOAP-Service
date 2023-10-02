<?php 
require_once "src/router/pageRouter.php";
$page=new pageRouter($_SERVER['REQUEST_URI']);
$page->getPage();
// run php -S localhost:8000 
