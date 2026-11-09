<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries'; // অথবা আপনার টেবিলের নাম যা আছে

    protected $fillable = [
        'title',
        'category',
        'image', // এটি যুক্ত করা বাধ্যতামূলক
    ];
}