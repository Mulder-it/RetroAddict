<?php

namespace Router;

use App\Exceptions\NotFoundException;

class Router
{
    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');//enlève les séparateur /
    }

    //Donne accès au tableau dans lequel on push les routes(GET)
    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }
    //Donne accès au tableau dans lequel on push les routes (POST)
    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    /**
     * @throws NotFoundException
     */


    public function run()
    {
        //Boucle sur les routes
        //récupère que ça soit une page en GET ou en POST grâce à $_SERVER['REQUEST_METHOD']
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                //excute() appelle le bon controleur avec la bonne fonction si la route match avec l'url
                return $route->execute();
            }
        }

        throw new NotFoundException("La page demandée est introuvable.");
    }

}