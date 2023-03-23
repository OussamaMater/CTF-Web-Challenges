<?php

namespace App\Models;

use App\Models\CTF;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challenge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ctf()
    {
        return $this->belongsTo(CTF::class);
    }
}
