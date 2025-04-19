<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tasks')->insert([

            [
                'title'=>'Desayunar',
                'order'=>1,
                'status'=>'pending'
            ],
            [
                'title'=>'Estudiar',
                'order'=>2,
                'status'=>'pending'
            ],
            [
                'title'=>'Ir al Gym',
                'order'=>3,
                'status'=>'pending'
            ],
            [
                'title' => 'Programar',
                'order' => 4,
                'status' => 'in progress'
            ],
            [
                'title' => 'Salir con mi novia hermosa',
                'order' => 5,
                'status' => 'completed'
            ]
            
        ]);
    }
}
