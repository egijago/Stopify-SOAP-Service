<?php 
echo($_SERVER['REQUEST_URI']);
echo($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_URI'] == "/") {
    require("src/views/home/index.php");
}
if ($_SERVER['REQUEST_URI'] == "/search") {
    require("src/views/search/index.php");
}

