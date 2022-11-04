<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number_of_book',
        'category_id'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    


}
