<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = "tags";

    protected $fillable = [
        'name',
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
