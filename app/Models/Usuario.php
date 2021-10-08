<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome','idade','peso','url']; 

    public function agendamentos(){
        return $this->hasMany(Agendamento::class);
    }

    public function foto(){
        return $this->hasMany(Foto::class);
    }
}
