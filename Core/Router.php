<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function add($method, $uri, $controller): static
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null,
        ];
        return $this;
    }

    public function get($uri, $controller): static
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): static
    {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller): static
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller): static
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller): static
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key)
    {
        return $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
              Middleware::resolve($route['middleware']);
              return require_once base_path("Http/controllers" . $route["controller"]);
            }
        }
        $this->abort();
        return $this;
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        return require_once base_path('Http/controllers/' . $code . '.php');
    }

    function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

}
