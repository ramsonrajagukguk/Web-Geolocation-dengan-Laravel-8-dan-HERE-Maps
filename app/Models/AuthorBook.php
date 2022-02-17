<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    protected $tabale = 'author_book';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function scopeIsBorrowed($query)
    {
        return $query->where('returned_at', null);
    }
}
