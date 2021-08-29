<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
