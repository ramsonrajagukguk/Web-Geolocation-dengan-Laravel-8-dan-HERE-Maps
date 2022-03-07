<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpacePhoto extends Model
{
  // Memasukkan data Spacephot secara  multicolumns
  protected $guarded = []; 

  // membuat relasi spacephoto dengan space, 
  // dimana setiap spacephoto ini dimiliki oleh  model space
  public function space()
  {
      return $this->belongsTo(Space::class, 'space_id', 'id');
  }
}