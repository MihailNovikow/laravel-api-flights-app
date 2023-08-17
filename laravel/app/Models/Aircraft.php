<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;

class Aircraft extends Model
{
    use HasFactory;
    protected $table = 'aircrafts';

    protected $fillable = [
        'tail',
    ];
public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
