<?php 
require_once "src/router/PageRouter.class.php";
$page=new pageRouter($_SERVER['REQUEST_URI']);
$page->getPage();
// run php -S localhost:8000 
