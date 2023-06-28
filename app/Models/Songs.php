<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'userid', 'playlist_id', 'url', 'title', 'duration'
    ];
}
