<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "workers";

    protected $fillable = ['name', 'nip', 'gender', 'dept_id', 'positions_id', '_token', '_method'];

    public function dept() //many to one
    {
        return $this->belongsTo(Dept::class);
    }

    public function positions() //many to one
    {
        return $this->belongsTo(Positions::class);
    }

}
