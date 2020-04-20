<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //


    protected $fillable = ['trip_id','property_id','value'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }



}
