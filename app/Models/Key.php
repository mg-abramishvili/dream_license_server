<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'key', 'status', 'comment'
    ];

    public function programs()
    {
        return $this->belongsToMany('App\Models\Program');
    }

    public function parameters()
    {
        return $this->belongsToMany('App\Models\Parameter');
    }
}
