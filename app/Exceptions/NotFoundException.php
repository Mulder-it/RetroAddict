<?php

namespace App\Exceptions;

use Exception;
use Throwable;
class NotFoundException extends Exception{
    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        //va chercher le constructeur parent
        parent::__construct($message, $code, $previous);
    }
    //Redirige vers la page d'erreur 404 quand une page n'est pas trouvée
    public function error404()
    {
        http_response_code(404);
        require VIEWS . 'errors/404.php';
    }
}
