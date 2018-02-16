<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $table = "categories";

    protected $fillable = [
        'title',
    ];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
}
