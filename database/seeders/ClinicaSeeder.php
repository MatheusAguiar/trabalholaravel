<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinica;

class ClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clinica::create(['nome' => 'Clinica Cel',
        'email' => 'clinicacel@gmail.com',
        'telefone' => '(38) 3744-1721',
        'logradouro' => 'Rua Conceição',
        'bairro' => 'Centro',
        'numero' => 95
        
    ]);
        
    Clinica::create(['nome' => 'Clinica Bem Estar',
        'email' => 'bemstar@gmail.com',
        'telefone' => '(38) 3744-1645',
        'logradouro' => 'Rua A',
        'bairro' => 'Centro',
        'numero' => 333
        
    ]);

    Clinica::create(['nome' => 'Clinica Bom Jesus',
        'email' => 'bomjesus@gmail.com',
        'telefone' => '(38) 3744-1467',
        'logradouro' => 'Rua Domingos Portugues',
        'bairro' => 'Vila Guilhermina',
        'numero' => 52
        
    ]);

    Clinica::create(['nome' => 'Clinica Visão',
        'email' => 'visao@gmail.com',
        'telefone' => '(38) 3744-1120',
        'logradouro' => 'Rua A',
        'bairro' => 'Alameda',
        'numero' => 100
        
    ]);

    }
}
