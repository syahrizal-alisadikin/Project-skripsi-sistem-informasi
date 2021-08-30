<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = ["peserta_id",'status','total_harga'];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class,'id','peserta_id');
    }
}
