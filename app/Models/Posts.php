<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    static $rules = [
		'title' => 'required',
    ];

    protected $table = 'posts';

    protected $fillable = [
        'title','body','userId'
    ];
}
