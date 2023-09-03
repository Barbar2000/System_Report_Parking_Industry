<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = ['_token', '_method', 'tanggal_mulai', 'tanggal_akhir', 'available_jadwal_id'];

    public function worker() //many to one
    {
        return $this->belongsTo(Worker::class);
    }

    public function available_jadwal()
    {
        return $this->belongsTo(Available_jadwal::class);
    }
}
