<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'name' => 'Unidad',
                'description' => 'Ex minim culpa sit sint Lorem eu nostrud labore nisi.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ciento',
                'description' => 'Nulla consectetur magna voluptate deserunt tempor.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Metro lineal',
                'description' => 'Sit qui eu velit aliquip non esse duis dolor voluptate deserunt ullamco.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Metro cubico',
                'description' => 'Aute tempor fugiat laborum sunt.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pie',
                'description' => 'Ut enim non occaecat sit eiusmod aliquip dolore non est eu ad sunt velit pariatur.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Yarda',
                'description' => 'Proident elit officia ut sunt in proident ut voluptate anim quis aliqua id voluptate.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cubeta',
                'description' => 'Culpa sunt nostrud ipsum consequat consequat cupidatat duis consequat aliqua Lorem sit labore quis consequat.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Galo',
                'description' => 'Qui qui eiusmod nisi quis quis id ex ullamco.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Medio galon',
                'description' => 'Consectetur pariatur ad voluptate aliquip tempor enim aliquip ut.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Botella',
                'description' => 'Culpa adipisicing laboris ut amet.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Media botella',
                'description' => 'Nisi aliquip mollit qui ad occaecat est commodo.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Quintal',
                'description' => 'Labore nulla dolor sint sunt reprehenderit incididunt non mollit.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '1/4 galón',
                'description' => 'Voluptate sunt culpa deserunt ex deserunt do proident tempor adipisicing deserunt magna.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pliego',
                'description' => 'Deserunt minim velit aliqua ex dolor quis aliquip.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Libra',
                'description' => 'Dolor adipisicing dolore cillum do ut fugiat excepteur est incididunt.',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
