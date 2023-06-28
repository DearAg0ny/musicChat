<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlists extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'userid', 'playlist_name', 'playlist_info'
        ];

    use HasFactory;
}
