<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalasanPengaduan extends Model
{
    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'balasan',
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}