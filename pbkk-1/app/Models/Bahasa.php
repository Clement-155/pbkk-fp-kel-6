<?php

namespace App\Models;

use App\Models\PaketSoal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bahasa extends Model
{
    public $fillable = [
        'bahasa',
    ];
    use HasFactory;

    public function paketSoal(): HasMany
    {
        return $this->hasMany(PaketSoal::class);
    }
}
