<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aircraft;

class Flight extends Model
{
    use HasFactory;
    protected $table = 'flights';

    protected $fillable = [
   'aircraft_id',
   'airport_id1',
   'airport_id2',
   'takeoff',
   'landing',
   'cargo_load',
   'cargo_offload'
    ];
public function aircraft()
    {
        return $this->hasOne(Aircraft::class);
    }
  /*  public function airport()
    {
        return $this->hasOne(Aircraft::class);
    }*/
}
