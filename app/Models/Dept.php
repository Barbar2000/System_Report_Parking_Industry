<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dept extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name'];
    protected $table = 'dept';
    public function workers() //one two many
    {
        return $this->hasMany(Worker::class);
    }
}
