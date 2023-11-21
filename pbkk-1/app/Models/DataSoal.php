<?php

namespace App\Models;

use App\Models\PaketSoal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataSoal extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

     protected $fillable = [
        'paket_soals_id',
        'tipe_soal',
        'soal',
        'jawaban'
     ];

     public function paketSoal(): BelongsTo
     {
         return $this->belongsTo(PaketSoal::class);
     }
}
