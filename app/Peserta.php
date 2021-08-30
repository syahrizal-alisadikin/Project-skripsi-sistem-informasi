<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peserta extends Model
{
    use SoftDeletes;
    protected $fillable = ["user_id","kelas_id","duration","kedatangan"];
}
