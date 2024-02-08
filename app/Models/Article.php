<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //extra config

    protected $table = 'artikel';

    protected $fillable = [
        'tajuk',
        'tarikh_publish',
        'penulis',
        'kategori'
    ];

    public function SocialMedia()
    {
        return $this->hasMany(SocialMedia::class, 'article_id','id');
    }
}
