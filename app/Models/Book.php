<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function borrowed(){
        return $this->belongsToMany(User::class, 'author_books'); 
        
    }
  
}
