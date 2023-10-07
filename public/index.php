<?php 
require_once __DIR__ . "/../src/router/PageRouter.class.php";
session_start();
$page=new pageRouter($_SERVER['REQUEST_URI']);
$page->getPage();
// run php -S localhost:8000 
