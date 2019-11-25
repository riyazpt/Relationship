<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
     protected $table="contact_person";
     protected $primaryKey ="person_id";
     public function company()
    {
        return $this->belongsTo('App\Company','company_id','id'); 
    }
    
     public function address()
    {
        return $this->hasOne('App\Address','address_id','address_id');
    }
}
