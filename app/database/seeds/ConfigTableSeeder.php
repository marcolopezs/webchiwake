<?php

use Chiwake\Entities\Configuration;
use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder {

    public function run()
    {

        Configuration::create([
            'titulo' => 'Chiwake',
            'dominio'  => 'http://chiwake.com',
            'keywords'      => 'restaurante,comida, salud, comida saludable',
            'descripcion'   => 'Venison spare ribs pork tail, beef meatloaf kielbasa turkey rump turducken beef ribs ground round sirloin kevin hamburger.'
        ]);

    }

} 