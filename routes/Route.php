<?php

namespace Router;

use Database\DBConnection;

class Route {

    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url)
    {
        //Remplace tout ce qui commence par : suivi de caractèes alphanumérique qui ne soit pas un /
        $path = preg_replace('#:([\w]+)#', '([^/])+', $this->path);
        $pathToMatch = "#^$path$#";

        //Permet de récupérer le paramètre d'url s'il yen a un ds un trableau[url,paramètres]
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }
    //récupère l'action
    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBConnection(DB_NAME, DB_HOST, DB_USER, DB_PWD));
        //1 car deuxième clé du tableau après le @ = méthode
        $method = $params[1];
        //Si variable non null on a un paramètre on appelle le controller avec le paramètre sinon on l'appelle normalement
        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }

}