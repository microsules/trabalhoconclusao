<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Esportes',
                'description' => 'Falando de esportes',
                'active' => true
            ],
            [
                'name' => 'Tecnologia',
                'description' => 'Falando de tecnologia',
                'active' => true
            ],
            [
                'name' => 'Geografia',
                'description' => 'Falando de Geografia',
                'active' => true
            ],
            [
                'name' => 'Moda',
                'description' => 'Falando de Moda',
                'active' => true
            ]
        ]);
    }
}
