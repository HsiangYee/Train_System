<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model{
    
    public $timestamps = false;

    function getStartStation(){
        return $this->hasone('App\Station', 'id', 'StartStation_id');
    }
}