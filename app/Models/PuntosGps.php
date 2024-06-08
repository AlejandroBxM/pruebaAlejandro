<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosGps extends Model
{
    public $fillable = ['dispositivo','imei','tiempo','placa','version','longitud','latitud','recepcion'];
    use HasFactory;
}
