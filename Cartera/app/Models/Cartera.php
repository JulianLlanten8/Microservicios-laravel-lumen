<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    /**
     * El atributo que se usa como llave primaria
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'titulo',
    ];
}
