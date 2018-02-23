<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

    public $table = "pictures";

    protected $fillable = [
        'name',
        'size',
        'link',
    ];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
