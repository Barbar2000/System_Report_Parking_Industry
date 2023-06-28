<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Available_jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'jam_mulai', 'jam_selesai'];
    protected $table = 'available_jadwal';
}
