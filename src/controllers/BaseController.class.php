<?php

abstract class BaseController {
    protected static $instance = null;
    protected $model = null;

    protected function __construct(){}

    public static function getInstance() {
        $subclass = static::class;
        if (!isset(self::$instance[$subclass])) {
            self::$instance[$subclass] = new static();
        }
        return self::$instance[$subclass];
    }

    public static function toResponse($response_code, $message, $payload) {
        http_response_code($response_code);
        echo(json_encode(["message" => $message, "data" => $payload]));
    }
}