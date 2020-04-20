<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    protected $fillable = ['name','description','slug','userID','picture'];


    public function tags()
    {
        return $this->hasMany(Tag::class);
    }


}
