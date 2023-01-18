<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    //
    protected $table = 'galeria';
    protected $fillable = [
        'nombre',
        'categoria_id',
        'imagen_principal',
        'descripcion',
        'fecha',
        'uuid',
        'user_id' 
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
