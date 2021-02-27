<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','details'
    ];
    /**
     *  get the book
     */
    public function book()
    {
        return $this->hasOne(Book::class);
    }
     /**
     * Get the books for the type book.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
