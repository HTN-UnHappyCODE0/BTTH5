<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'theloai';
    protected $primaryKey = 'ma_tloai';
    public $timestamps = false;


    protected $fillable = [
        'ten_tloai',
    ];


    public function articles()
    {
        return $this->hasMany(Article::class, 'ma_tloai', 'ma_tloai');
    }
}
