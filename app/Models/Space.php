<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
     // Memasukkan data dengan multicolumns
     protected $guarded = []; 
     
    //  Membuat relasi space ke spacephoto dimana 1 space memiliki banyak spacephoto
   public function photos()
   {
       return $this->hasMany(SpacePhoto::class, 'space_id', 'id');
   }

    // membuat relasi space dengan user, 
    // dimana setiap space ini dimiliki oleh  model user

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}