<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    //

    protected $table = 'relations';

    public function permission(){
        return $this->hasOne(Permission::class);
    }
}
