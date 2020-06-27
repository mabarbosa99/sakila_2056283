<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table="actor";
    protected $primaryKey="actor_id";
    public $timestamps = false;

    public function peliculas(){
        return $this->belongsToMany('App\Pelicula','film_actor', 'actor_id','film_id');
    }
}
