<?php

namespace App\Models;

use App\Models\Bahasa;
use App\Models\DataSoal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketSoal extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

     protected $fillable = [
        'bahasas_id',
        'nama_paket',
        'deskripsi'
     ];

     public function dataSoal(): HasMany
     {
         return $this->hasMany(DataSoal::class);
     }

     public function bahasa(): BelongsTo
     {
         return $this->belongsTo(Bahasa::class);
     }
}
