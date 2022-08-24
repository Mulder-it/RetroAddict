<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);

    }

    public function getAllUsers(): User
    {
        return $this->query("SELECT * FROM {$this->table}");
    }

    public function getByUsername(string $username): User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }

    public function getByEmail(string $email): User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
    }

    public function getEmail(int $id): User
    {
        return $this->query("SELECT email FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function getUserName(int $id): User
    {
        return $this->query("SELECT username FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function getUserFirstname(int $id): User
    {
        return $this->query("SELECT firstname FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function getUserPassword(int $id): User
    {
        return $this->query("SELECT password FROM {$this->table} WHERE id = ?", [$id], true);
    }
    public function getAdminStatus (int $id): User
    {
        return $this->query("SELECT admin FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function deleteUser(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
    }

}