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
            'equivalente' => 'L',
            'valor' => '0.001'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'L',
            'equivalente' => 'ml',
            'valor' => '1000'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'gal',
            'equivalente' => 'L',
            'valor' => '3.78'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'mg',
            'equivalente' => 'gr',
            'valor' => '0.001'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'gr',
            'equivalente' => 'kg',
            'valor' => '1000'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'Kg',
            'equivalente' => 'gr',
            'valor' => '1000'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'lb',
            'equivalente' => 'gr',
            'valor' => '453.59'
        ]);
        factory(\App\Metric::class, 1)->create([
            'name' => 'unidad',
            'equivalente' => 'unidad',
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
        $this->llenarInsumo('AMINO PLUS' , '20' , 2 , 180 , 'NA');
        $this->llenarInsumo('AQUABLOOM' , '30' , 6 , 12.3 , 'NA');
        $this->llenarInsumo('BARBASCO' , '1' , 8 , 6 , 'NA');
        $this->llenarInsumo('BIOBAC H' , '5' , 2 , 75 , 'NA');
        $this->llenarInsumo('CAL P24' , '25' , 6 , 3.86 , 'NA');
        $this->llenarInsumo('CAL VIVA' , '25' , 6 , 7.68 , 'NA');
        $this->llenarInsumo('CARBONATO DE CALCIO' , '45' , 6 , 3.68 , 'NA');
        $this->llenarInsumo('DAP' , '50' , 6 , 29 , 'NA');
        $this->llenarInsumo('FITO BLOOM' , '30' , 6 , 15.97 , 'NA');
        $this->llenarInsumo('FORCE O2' , '25' , 6 , 87.5 , 'NA');
        $this->llenarInsumo('FORDEX LIQUIDO' , '10' , 2 , 59.64 , 'NA');
        $this->llenarInsumo('FORDEX POLVO' , '20' , 6 , 78.33 , 'NA');
        $this->llenarInsumo('FORMYCINE' , '25' , 2 , 150 , 'NA');
        $this->llenarInsumo('GRENNFENICOL' , '1' , 6 , 42.23 , 'NA');
        $this->llenarInsumo('KILLFISH' , '1' , 2 , 67 , 'NA');
        $this->llenarInsumo('LIPTOCITRO' , '4' , 6 , 39.9 , 'NA');
        $this->llenarInsumo('MELAZA' , '30' , 6 , 7.9 , 'NA');
        $this->llenarInsumo('MINERSIL' , '25' , 6 , 24.95 , 'NA');
        $this->llenarInsumo('MURIATO POTASIO' , '50' , 6 , 23 , 'NA');
        $this->llenarInsumo('NITRATO DE AMONIO ' , '50' , 6 , 18.5 , 'NA');
        $this->llenarInsumo('NITRO BACTER PLUS ' , '1' , 3 , 120 , 'NA');
        $this->llenarInsumo('OXITETRACICLINA ' , '25' , 6 , 23 , 'NA');
        $this->llenarInsumo('PEROXIDO ' , '30' , 6 , 33.6 , 'NA');
        $this->llenarInsumo('POND PLUS ' , '10' , 6 , 430.14 , 'NA');
        $this->llenarInsumo('SILICATO ACUICOLA ' , '40' , 6 , 11.5 , 'NA');
        $this->llenarInsumo('STAR SIL ' , '20' , 2 , 280 , 'NA');
        $this->llenarInsumo('SULFATO DE MAGNESIO ' , '25' , 6 , 9.5 , 'NA');
        $this->llenarInsumo('VIRKON ' , '10' , 6 , 324.8 , 'NA');
        $this->llenarInsumo('VITAMINA C ' , '1' , 6 , 8 , 'NA');
        $this->llenarInsumo('ZEOLITA NATURAL FINA ' , '30' , 6 , 2.7 , 'NA');

        // =================== CREACION DE PRODUCTO BALANCEADO ===================
        $this->llenarProduct('LORICA #1 (42%)' , '25' , 6 , 53.15 , 'Gisis S.A.');
        $this->llenarProduct('LORICA #2 (42%)' , '25' , 6 , 51.88 , 'Gisis S.A.');
        $this->llenarProduct('LORICA #4' , '25' , 6 , 36.4 , 'Gisis S.A.');
        $this->llenarProduct('LORICA #3 (1.6-1.8 MM) 38%' , '25' , 6 , 37.89 , 'Gisis S.A.');
        $this->llenarProduct('LORICA #5' , '25' , 6 , 35.23 , 'Gisis S.A.');
        $this->llenarProduct('LORICA #6' , '25' , 6 , 34.72 , 'Gisis S.A.');
        $this->llenarProduct('MASTERLINE 28% #6' , '25' , 6 , 23.92 , 'Gisis S.A.');
        $this->llenarProduct('MASTERLINE 35% #6' , '25' , 6 , 27.03 , 'Gisis S.A.');
        $this->llenarProduct('NATURE WELLNESS 35% #4' , '25' , 6 , 32.11 , 'Gisis S.A.');
        $this->llenarProduct('NATURE WELLNESS 38% #3' , '25' , 6 , 34.15 , 'Gisis S.A.');
        $this->llenarProduct('NATURE WELLNESS 42% #1' , '25' , 6 , 49.17 , 'Gisis S.A.');
        $this->llenarProduct('NATURE WELLNESS 42% #2' , '25' , 6 , 47.85 , 'Gisis S.A.');
        $this->llenarProduct('OPTILINE #5 (35%)' , '25' , 6 , 29.48 , 'Gisis S.A.');
        $this->llenarProduct('OPTILINE #5 AD' , '25' , 6 , 30.51 , 'Gisis S.A.');
        $this->llenarProduct('OPTILINE #6 (35%)' , '25' , 6 , 29.48 , 'Gisis S.A.');
        $this->llenarProduct('OPTILINE #6 (35%)' , '25' , 6 , 28.55 , 'Gisis S.A.');
        $this->llenarProduct('OPTILINE 35% #5 EXTRUIDO' , '25' , 6 , 31.48 , 'Gisis S.A.');
        $this->llenarProduct('OPTILINE 35% #6 EXTRUIDO' , '25' , 6 , 30.97 , 'Gisis S.A.');

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

    protected function llenarProduct($name , $cantidad, $metric_id, $precio , $proveedor){
        factory(\App\Product::class, 1)->create([
            'name' => $name,
            'cantidad' => $cantidad,
            'metric_id' => $metric_id,
            'precio' => $precio,
            'proveedor' => $proveedor
        ]);
    }
}
