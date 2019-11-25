<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
     protected $table="companies";
     
     protected $fillable = ['company_name','company_address'];
     public function contactpersons() {
        return $this->hasMany('App\ContactPerson', 'company_id', 'id');
    }

}
