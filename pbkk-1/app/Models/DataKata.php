<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharData extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'image',
        'full_name',
        'nickname',
        'description',
        'base_prot',
        'prot_multiplier',
        'base_dmg',
        'dmg_multiplier',

    ];

}
