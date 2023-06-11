<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'baiviet';
    protected $primaryKey = 'ma_bviet';
    public $timestamps = false;


    protected $fillable = [
        'tieude',
        'ten_bhat',
        'ma_tloai',
        'tomtat',
        'noidung',
        'ma_tgia',
        'ngayviet',
        'hinhanh',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'ma_tloai', 'ma_tloai');
    }

    // Relationship với bảng "tacgia"
    public function author()
    {
        return $this->belongsTo(Author::class, 'ma_tgia', 'ma_tgia');
    }
}
