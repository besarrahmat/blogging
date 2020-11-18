<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['penulis', 'judul', 'isi'];
    
    
    protected $dates = [];
    
    public static $rules = [
        'penulis' => 'required',
        'judul' => 'required',
        'isi' => 'required'
    ];
}