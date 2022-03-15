<?php

namespace App\models;

class User extends Model
{
    protected $table = 'utilisateur';

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }
    public function getByUsername(string $username): User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }


}