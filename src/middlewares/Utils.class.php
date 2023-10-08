<?php 
include_once(PROJECT_ROOT_PATH . "/src/exceptions/UnauthorizedException.class.php");

class Utils 
{
    public static function mergeParams(&$params)
    {
        $params = array_merge($params, $_POST, $_GET);
    }

    public static function checkAdmin($params=[])
    {
        if ($_SESSION['role'] !== "admin")
        {
            throw new UnauthorizedException();
        }
    }

    public static function checkUser($params=[])
    {
        if ($_SESSION['role'] !== "user")
        {
            throw new UnauthorizedException();
        }
    }

    public static function checkLogin($params=[])
    {
        if ($_SESSION['username'] !== "admin")
        {
            throw new UnauthorizedException();
        }
    }

    public static function checkAuthorized($params=[])
    {
        if (!($_SESSION['role'] == "admin" || $_SESSION['id_user'] == $params["id_user"]))
        {
            throw new UnauthorizedException();
        }
    }

    public static function check($params)
    {
        echo("FOOBAR");
    }
}
