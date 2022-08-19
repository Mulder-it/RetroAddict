<?php

namespace App\Validation;

class Validator {

    private $data;
    private $errors;


    public function __construct(array $data)
    {
        $this->data = $data;
    }

    //boucle sur le tableau de règles rentré en paramètres et peut renvoyer un tableau
    public function validate(array $rules): ?array
    {
        //parcours le tableau de règles
        foreach ($rules as $name => $rulesArray) {
            //vérifie que la donnée du tableau de règle est ds le tableau d'input
            if (array_key_exists($name, $this->data)) {
                //boucle sur les règles
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                            //si les 3 premier caratère son strictement =à min, ok
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                        default:

                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    private function required(string $name, string $value)
    {
        //retirer les espace finaux et initiaux
        $value = trim($value);
        // Si valeur diff null ou vide envoie une erreur
        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis.";
        }
    }

    private function min(string $name, string $value, string $rule)
    {
        //récupère tt les numerique de la chaine de caractère
        preg_match_all('/(\d+)/', $rule, $matches);
        //place du min 3 dans le tableau typinté en INT
        $limit = (int) $matches[0][0];

        //si caractère n'a pas atteint la limite de caractère demandé message d'erreur
        if (strlen($value) < $limit) {
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères";
        }
    }

    private function getErrors(): ?array
    {
        return $this->errors;
    }
}
