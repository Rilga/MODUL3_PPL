<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // use HasFactory;
    // protected $table = 'tbl_cart';
    protected $guarded = [];
    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}
