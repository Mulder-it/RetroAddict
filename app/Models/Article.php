<?php

namespace App\models;

class Article extends Model
{
    protected $table = 'article';

    public function findById(int $id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id_article = ?", [$id], true);
    }

    public function  getAllArticle()
    {
        return $this->query("SELECT * FROM {$this->table}");
    }

}