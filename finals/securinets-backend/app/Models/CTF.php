<?php

namespace App\Models;

use App\Enums\CTFStatus;
use App\Models\Challenge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CTF extends Model
{
    use HasFactory;

    protected $table = 'ctfs';

    protected $guarded = [];

    protected $casts = [
        'status' => CTFStatus::class,
    ];

    public function challenges()
    {
        return $this->hasMany(Challenge::class, 'ctf_id', 'id');
    }
}
