<?php

use Chiwake\Entities\Menu;
use Faker\Factory as Faker;

class MenusTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=50; $i++)
        {
            $titulo = $faker->sentence($nbWords = 8);
            $slug_url = Str::slug($titulo);

            $fecha = $faker->date($format = 'Y-m-d', $max = 'now');
            $hora = $faker->time($format = 'H:i:s', $max = 'now');

            Menu::create([
                'titulo'    => $titulo,
                'slug_url'  => $slug_url,
                'descripcion' => $faker->text($maxNbChars = 200),
                'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
                'imagen' => $faker->randomElement($array = ['imagen-1.jpg','imagen-2.jpg','imagen-3.jpg','imagen-4.jpg','imagen-5.jpg']),
                'imagen_carpeta' => 'abril2015/',
                'publicar' => '1',
                'menu_category_id' => $faker->randomElement($array = [1,2,3,4,5]),
                'published_at' => $fecha." ".$hora
            ]);
        }

    }

}