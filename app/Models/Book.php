<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table='books';
    protected $dates=['deleted_at'];
    protected $fillable=[
        'book_name',
        'writer',
        'book_photo',
        'book_source',
        'num_of_pages',
    ];

}
