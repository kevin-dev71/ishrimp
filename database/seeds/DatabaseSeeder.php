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

        // =================== CREACION DE INSUMOS ===================
        $this->llenarInsumo('ACIDSTAR' , '3.5' , 6 , 60 , 'NA');
        $this->llenarInsumo('AMINO PLUS' , '20' , 6 , 180 , 'NA');
        $this->llenarInsumo('AQUABLOOM' , '30' , 6 , 12.3 , 'NA');
        $this->llenarInsumo('BARBASCO' , '1' , 8 , 6 , 'NA');
        $this->llenarInsumo('BIOBAC H' , '5' , 6 , 75 , 'NA');
        $this->llenarInsumo('CAL P24' , '25' , 6 , 3.86 , 'NA');
        $this->llenarInsumo('CAL VIVA' , '25' , 6 , 7.68 , 'NA');
        $this->llenarInsumo('CARBONATO DE CALCIO' , '45' , 6 , 3.68 , 'NA');
        $this->llenarInsumo('DAP' , '50' , 6 , 29 , 'NA');
        $this->llenarInsumo('FITO BLOOM' , '30' , 6 , 15.97 , 'NA');
        $this->llenarInsumo('FORCE O2' , '25' , 6 , 87.5 , 'NA');
        $this->llenarInsumo('FORDEX LIQUIDO' , '10' , 6 , 59.64 , 'NA');
        $this->llenarInsumo('FORDEX POLVO' , '20' , 6 , 78.33 , 'NA');
        $this->llenarInsumo('FORMYCINE' , '25' , 6 , 150 , 'NA');
        $this->llenarInsumo('GRENNFENICOL' , '1' , 6 , 42.23 , 'NA');
        $this->llenarInsumo('KILLFISH' , '1' , 6 , 67 , 'NA');
        $this->llenarInsumo('LIPTOCITRO' , '4' , 6 , 39.9 , 'NA');
        $this->llenarInsumo('MELAZA' , '30' , 6 , 7.9 , 'NA');
        $this->llenarInsumo('MINERSIL' , '25' , 6 , 24.95 , 'NA');
        $this->llenarInsumo('MURIATO POTASIO' , '50' , 6 , 23 , 'NA');
        $this->llenarInsumo('NITRATO DE AMONIO ' , '50' , 6 , 18.5 , 'NA');
        $this->llenarInsumo('NITRO BACTER PLUS ' , '1' , 6 , 120 , 'NA');
        $this->llenarInsumo('OXITETRACICLINA ' , '25' , 6 , 23 , 'NA');
        $this->llenarInsumo('PEROXIDO ' , '30' , 6 , 33.6 , 'NA');
        $this->llenarInsumo('POND PLUS ' , '10' , 6 , 430.14 , 'NA');
        $this->llenarInsumo('SILICATO ACUICOLA ' , '40' , 6 , 11.5 , 'NA');
        $this->llenarInsumo('STAR SIL ' , '20' , 6 , 280 , 'NA');
        $this->llenarInsumo('SULFATO DE MAGNESIO ' , '25' , 6 , 9.5 , 'NA');
        $this->llenarInsumo('VIRKON ' , '10' , 6 , 324.8 , 'NA');
        $this->llenarInsumo('VITAMINA C ' , '1' , 6 , 8 , 'NA');
        $this->llenarInsumo('ZEOLITA NATURAL FINA ' , '30' , 6 , 2.7 , 'NA');
    }

    protected function llenarInsumo($name , $cantidad, $metric_id, $precio , $proveedor){
        factory(\App\Insumo::class, 1)->create([
            'name' => $name,
            'cantidad' => $cantidad,
            'metric_id' => $metric_id,
            'precio' => $precio,
            'proveedor' => $proveedor
        ]);
    }
}
