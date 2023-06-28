<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;


    protected $table = "absensi";


    public function worker() //many to one
    {
        return $this->belongsTo(Worker::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
