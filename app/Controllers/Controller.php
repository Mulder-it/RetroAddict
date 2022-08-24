<?php

namespace App\Controllers;

use Database\DBConnection;

abstract class Controller
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->db = $db;
    }

    //Met le path en tampon pendant traitement avant de charger la vue associée dans le content
    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    //Récupère la connexion à la base de données
    protected function getDB()
    {
        return $this->db;
    }
    //Vérification user est un administrateur
    protected function isAdmin()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
            return true;
        } else {
            return header('Location: /RetroAddict/login');
        }
    }
    //Vérification user est connecté
    public function isLogged()
    {
        if (isset($_SESSION['auth'])) {
            return true;
        } else {
            return header('Location: /RetroAddict/login');
        }
    }



}