<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    protected $fillable = [
      'name',
      'level_id',
      'classnumber'
      ];

    public function sclassstream(){
      return $this->hasMany('App\SclassStream','sclass_id');
    }

}
