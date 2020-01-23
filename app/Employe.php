<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employes'; 
    protected $fillable = ['first_name' , 'last_name' , 'company_id' , 'email', 'phone'];
 	protected $guarded = [];

     public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
