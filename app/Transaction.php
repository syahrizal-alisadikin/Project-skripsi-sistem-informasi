<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = ["peserta_id",'status','total_harga','snap_token','code'];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class,'peserta_id','id');
    }
}
