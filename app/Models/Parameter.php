<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'dreambox_theme',
        'dreambox_orientation',
        'dreambox_title',
        'dreambox_module_photoalbums',
        'dreambox_module_videoalbums',
        'dreambox_module_news',
        'dreambox_module_routes',
        'dreambox_module_reviews',
    ];

    public function keys()
    {
        return $this->belongsToMany('App\Models\Key');
    }
}
