<?php

namespace  Database;

use PDO;

class DBConnection
{
    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;

    public function __construct(string $dbname, string $host, string $username, string $password)
    {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }


    public function getPDO(): PDO
    {

        //ternaire, ?? = opérateur Null coalescent : il renvoit la première opérande si elle existe sinon l'autre.
        return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host}", $this->username, $this->password, [
                //Mode report d'erreur lance des excéptions
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Définit mode de récupération en Fetch_obj qui retourne un objet avec noms de propriétés correspondant aux colonnes retournées
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
            ]);
    }
}