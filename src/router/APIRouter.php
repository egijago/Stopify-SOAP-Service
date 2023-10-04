<?php
class APIRouter 
{
    private array $routes;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = "DELETE";

    public function get(string $path, $handler) 
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    public function delete(string $path, $handler) 
    {
        $this->addHandler(self::METHOD_DELETE, $path, $handler);
    }

    public function put(string $path, $handler) 
    {
        $this->addHandler(self::METHOD_PUT, $path, $handler);
    }

    public function post(string $path, $handler) 
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }
    private function addHandler(string $method, string $path, $handler) 
    {
        $this->routes[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }

    public function run() 
    {
        $request_url = parse_url($_SERVER['REQUEST_URI']);
        $request_path = $request_url['path'];
        $request_method = $_SERVER['REQUEST_METHOD'];

        $callback = null;
        $path_params = array();
        foreach ($this->routes as $route) 
        {
            $pattern = str_replace('/', '\/', $route['path']);
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $request_path, $matches) && $route['method'] === $request_method) 
            {
                $callback = $route['handler'];
                $path_params = $matches;
                array_shift($path_params);
                break;
            }
        }

        if (!$callback) 
        {
            header("HTTP/1.0 404 Not Found");
            return;
        }

        // /*DEBUG*/
        // echo("PARAMS: " . json_encode($params) . "\n");
        // echo("QUERY STRING: " . json_encode($_SERVER['QUERY_STRING']) . "\n");
        // echo("_GET: " . json_encode($_GET) . "\n");
        // echo("file_get_contents('php://input'): " . json_encode(json_decode(file_get_contents('php://input'))) . "\n");

        call_user_func($callback, $path_params);
    }
}