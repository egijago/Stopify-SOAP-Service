<?php 
require_once "src/router/pageRouter.php";

$page=new pageRouter("register");
$page->getPage();
// run php -S localhost:8000 
