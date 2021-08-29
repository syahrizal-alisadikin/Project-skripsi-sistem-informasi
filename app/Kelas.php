<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $fillable = ["name","slug","type","image","description","harga"];

    public function getImageAttribute($image)
    {
        return asset('storage/kelas/' . $image);
    }

    public function materi()
    {
        return $this->belongsToMany(Materi::class);
    }

    public function includes()
    {
        return $this->belongsToMany(Includes::class);
    }
}
