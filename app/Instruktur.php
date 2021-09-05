<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instruktur extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','alamat','phone','email','status','jenis_kelamin'];
}
