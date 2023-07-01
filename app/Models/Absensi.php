<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;


    protected $table = "absensi";

    protected $fillable = ['_token', '_method', 'tanggal', 'jam_absen', 'deskripsi'];


    public function worker() //many to one
    {
        return $this->belongsTo(Worker::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
