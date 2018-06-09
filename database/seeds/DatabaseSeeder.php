<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(UsersRolesSeeder::class);

        // =================== CREACION DE METRICAS ===================
        factory(\App\Metric::class, 1)->create([
            'name' => 'mL',
            'valor' => '0.001'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'L',
            'valor' => '1'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'gal',
            'valor' => '3.78'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'mg',
            'valor' => '0.001'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'gr',
            'valor' => '1'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'Kg',
            'valor' => '1000'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'lb',
            'valor' => '453.59'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'unidad',
            'valor' => '1'
        ]);

        // =================== CREACION DE TALLAS ===================
        factory(\App\Talla::class, 1)->create([
            'name' => '20-30',
            'peso' => '29/30/31/32'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '30-40',
            'peso' => '25/26/27/28'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '40-50',
            'peso' => '20/21/22/23/24'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '50-60',
            'peso' => '17/18/19'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '60-70',
            'peso' => '15-16'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '70-80',
            'peso' => '13/14'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '80-100',
            'peso' => '10/11/12'
        ]);
        factory(\App\Talla::class, 1)->create([
            'name' => '100-120',
            'peso' => '8/9'
        ]);
    }
}
