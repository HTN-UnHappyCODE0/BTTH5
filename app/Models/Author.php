<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'tacgia';
    protected $primaryKey = 'ma_tgia';
    public $timestamps = false;


    protected $fillable = [
        'ten_tgia',
        'hinh_tgia',
    ];


    public function articles()
    {
        return $this->hasMany(Article::class, 'ma_tgia', 'ma_tgia');
    }
}
