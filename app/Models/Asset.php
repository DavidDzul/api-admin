<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id_asset', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'id_asset', 'id');
    }
}
