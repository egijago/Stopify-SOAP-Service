<?php
class APIRouter {
    private array $routes;
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = "DELETE";

    public function get(string $path, $handler) {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    public function delete(string $path, $handler) {
        $this->addHandler(self::METHOD_DELETE, $path, $handler);
    }

    public function put(string $path, $handler) {
        $this->addHandler(self::METHOD_PUT, $path, $handler);
    }

    public function post(string $path, $handler) {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }
    private function addHandler(string $method, string $path, $handler) {
        $this->routes[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }

    public function run() {
        $request_url = parse_url($_SERVER['REQUEST_URI']);
        $request_path = $request_url['path'];
        $request_method = $_SERVER['REQUEST_METHOD'];

        $callback = null;
        $params = array();
        foreach ($this->routes as $route) {
            $pattern = str_replace('/', '\/', $route['path']);
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)', $pattern);
            $pattern = '/^' . $pattern . '$/';

            if (preg_match($pattern, $request_path, $matches) && $route['method'] === $request_method) {
                $callback = $route['handler'];
                $params = $matches;
                array_shift($params);
                break;
            }
        }


        if (!$callback) {
            header("HTTP/1.0 404 Not Found");
            return;
        }

        if ($request_method === APIRouter::METHOD_POST) {
            $params = array_merge($params, $_POST);
        } else if ($request_method === APIRouter::METHOD_PUT) {
            $params = array_merge(json_decode(file_get_contents('php://input')));
        }

        call_user_func($callback, $params);
    }
}