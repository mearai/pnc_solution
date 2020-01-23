<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $table = 'company'; 
    protected $fillable = ['name' , 'email' , 'logo' , 'website'];
    protected $guarded = [];

      public function employes(){
    
        return $this->hasMany(Employe::class);
    }
}
