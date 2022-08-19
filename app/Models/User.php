<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }
    public function getByUsername(string $username): User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }
    public function getByEmail(string $email):User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
    }


}