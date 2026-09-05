<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'isi_pengaduan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balasan()
    {
        return $this->hasMany(BalasanPengaduan::class);
    }
}