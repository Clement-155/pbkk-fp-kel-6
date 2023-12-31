<?php

namespace App\Models;

use App\Models\Bahasa;
use App\Models\DataSoal;
use Database\Factories\PaketFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        'last_editor',
        'bahasas_id',
        'nama_paket',
        'deskripsi'
     ];

     /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return PaketFactory::new();
    }

     public function dataSoal(): HasMany
     {
         return $this->hasMany(DataSoal::class, "paket_soals_id");
     }

     public function bahasa(): BelongsTo
     {
         return $this->belongsTo(Bahasa::class, "bahasas_id");
     }
}
