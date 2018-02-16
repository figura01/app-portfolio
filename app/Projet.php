<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Picture;

class Projet extends Model
{
    public $table = "projets";

    protected $fillable = [
        'name',
        'title',
        'excerpt',
        'content',
        'link',
        'published',
        'categorie_id',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function pictures()
    {
        return $this->belongsToMany(Picture::class);
    }

    public function checkedTagId($id){
        if(!empty($this->tags)){
            foreach($this->tags as $tag){
                if( $tag->id == $id ) return true;
            }
        }
        return false;
    }
}
