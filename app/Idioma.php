<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idioma extends Model
{
    protected $table="language";
    protected $primaryKey = "language_id";
    public $timestamps = false;

    public function peliculas(){
        return $this->HasMany('App\Pelicula','language_id');
    }
}
