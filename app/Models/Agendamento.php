<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'horario',
        'motivo',
        'usuario_id',
        'medico_id',
        'clinica_id'
    ];

    public function clinica(){
        return $this->belongsTo(Clinica::class);
    }

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
