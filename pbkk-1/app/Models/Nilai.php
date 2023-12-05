<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['user_id', 'paket_soal_id', 'nilai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paketSoal()
    {
        return $this->belongsTo(PaketSoal::class);
    }
    use HasFactory;
}
