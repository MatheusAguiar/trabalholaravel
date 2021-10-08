<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert(['nome' => 'Matheus Henrique',
        'crm' => 90654,
        'telefone' => '(38) 99993-4082',
        'nascimento' => Carbon::create('1997', '15', '07'),
        'endereco' => 'Rua Conceição, 95, Centro',
        'especialidade' => 'Cardiologista'
        
    ]);

         DB::table('medicos')->insert(['nome' => 'Joana',
         'crm' => 14654,
         'telefone' => '(38) 99783-4082',
         'nascimento' => Carbon::create('1997','05','01'),
         'endereco' => 'Rua B, 100, Alameda',
         'especialidade' => 'Pediatria'
    
]);

        DB::table('medicos')->insert(['nome' => 'Fernanda Santos',
        'crm' => 12564,
        'telefone' => '(38) 99983-1452',
        'nascimento' => Carbon::create('1996','06','26'),
        'endereco' => 'Rua Conceição, 333, Centro',
        'especialidade' => 'Dermatologia'

]);

       DB::table('medicos')->insert(['nome' => 'Pedro Antonio',
        'crm' => 14596,
        'telefone' => '(38) 99873-1205',
        'nascimento' => Carbon::create('1997','07','27'),
        'endereco' => 'Rua A, 95, Sagrada Familia',
        'especialidade' => 'Ginecologia'

    ]);
 }
}
