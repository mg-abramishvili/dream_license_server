<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_code', 'title'
    ];

    public function keys()
    {
        return $this->belongsToMany('App\Models\Key');
    }
}
