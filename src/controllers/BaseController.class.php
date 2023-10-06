<?php


// Log a message to a file
$message = "Something happened!";
error_log($message, 3, "error.log");


abstract class BaseController 
{
    protected static $instance = null;
    protected $model = null;

    protected function __construct(){}

    public static function getInstance() 
    {
        $subclass = static::class;
        if (!isset(self::$instance[$subclass])) 
        {
            self::$instance[$subclass] = new static();
        }
        return self::$instance[$subclass];
    }

    public static function getQueryParams() 
    {
        return $_GET;
    }

    public static function getBodyParams() 
    {
        // echo($_SERVER['CONTENT_TYPE'] . "\n");
        // echo("FILES:". json_encode($_FILES) . "\n");
        // echo("POST:". json_encode($_POST). "\n" );
        // echo("SERVER:". json_encode($_SERVER). "\n");
        // echo("JSON: " . file_get_contents('php://input'));

        $content_type = $_SERVER['CONTENT_TYPE'];
        if ($content_type === 'application/json') 
        {
            return json_decode(file_get_contents('php://input'), true);
        }
        else if ($content_type === 'application/x-www-form-urlencoded')
        {
            return $_POST;
        }
        else if (preg_match('/multipart\/form-data(.*)$/', $content_type, $matches)) 
        {
            return array_merge($_POST, $_FILES);            
        }
        else 
        {
            throw new Exception(json_encode($_SERVER));
        }
    }

    public static function toResponse($response_code, $message, $payload) 
    {
        http_response_code($response_code);
        echo(json_encode(["message" => $message, "data" => $payload]));
    }
}