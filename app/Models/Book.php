<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'author','book_type',
    ];
    /**
     *  get the book_type associated  with book
     */
    public function BookType()
    {
         return $this->belongsTo(BookType::class,'book_type', 'id');
    }
}
