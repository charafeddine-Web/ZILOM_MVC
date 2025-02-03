<?php
namespace Core;

class Router
{
    private $routes = [];

    // Ajouter une route
    public function add($method, $path, $controller, $action)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => trim($path, '/'),
            'controller' => $controller,
            'action' => $action
        ];
    }

    // Dispatcher la requête
    public function dispatch($requestUri, $requestMethod)
    {
        $requestPath = trim(parse_url($requestUri, PHP_URL_PATH), '/');
        $requestMethod = strtoupper($requestMethod);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestPath) {
                $controllerClass = "App\\Controllers\\" . $route['controller'];

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();

                    if (method_exists($controller, $route['action'])) {
                        return call_user_func([$controller, $route['action']]);
                    } else {
                        throw new \Exception("Méthode {$route['action']} non trouvée dans {$controllerClass}");
                    }
                } else {
                    throw new \Exception("Contrôleur {$controllerClass} non trouvé");
                }
            }
        }

        // Si aucune route ne correspond
        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}
