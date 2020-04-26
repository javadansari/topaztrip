<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use QCod\ImageUp\HasImageUploads;

class Trip extends Model
{

    protected $fillable = ['name','description','slug','userID','picture'];


    public function tags()
    {
        return $this->hasMany(Tag::class);
    }


}
