<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
                'name' => 'Carpintería',
	        	'description' => 'Materiales para carpintería, madera, clavos, etc.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Construcción',
	        	'description' => 'Materiales para construcción, blocks, cemento, etc.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Herramientas',
	        	'description' => 'Relacionado con herramientas de uso necesario en construcción y otros.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Fontanería',
                'description' => null,
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Jardineria',
	        	'description' => 'Todo lo relacionado con jardinería',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pintura',
	        	'description' => 'Magna laboris duis aliquip elit non.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aceite',
	        	'description' => 'Nostrud elit sunt dolor officia minim occaecat.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tornillos',
	        	'description' => 'Ad minim tempor culpa laborum dolor id cupidatat.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Clavos',
	        	'description' => 'Dolor dolore labore ad consequat mollit commodo pariatur.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Martillos',
	        	'description' => 'Veniam nostrud in eiusmod labore ipsum consectetur magna amet sunt veniam exercitation laborum officia.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Palas',
	        	'description' => 'Ipsum exercitation enim dolor do aliquip exercitation nostrud culpa ipsum id do excepteur nostrud tempor.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Carretas',
	        	'description' => 'Ullamco non in laboris dolore ipsum id commodo exercitation.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Imágenes',
	        	'description' => 'Excepteur pariatur aliquip laborum culpa qui.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tests',
	        	'description' => 'Eu duis culpa do veniam pariatur cupidatat tempor et.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Otros',
	        	'description' => 'Aliquip ad ex consectetur nisi sint ullamco nisi esse enim excepteur nisi est magna.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Utencilios',
	        	'description' => 'Mollit duis veniam esse sunt consectetur aute reprehenderit aliquip.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Paredes',
	        	'description' => 'Culpa eiusmod minim tempor aute dolore ex ad mollit eiusmod id culpa.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Blocks',
	        	'description' => 'Non irure esse velit dolore laborum.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pegamentos',
	        	'description' => 'Sit occaecat officia pariatur ex laboris occaecat voluptate.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Oleo',
	        	'description' => 'Est ut qui est commodo elit tempor elit esse laboris aliquip occaecat.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Nose',
	        	'description' => 'Consectetur est in pariatur incididunt eiusmod minim qui fugiat.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pares',
	        	'description' => 'Reprehenderit fugiat veniam aliquip minim et.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cascos',
	        	'description' => 'Culpa tempor in elit Lorem voluptate excepteur.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Guantes',
	        	'description' => 'Deserunt deserunt amet esse ex esse deserunt eu eiusmod mollit id commodo consequat et.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Piezas',
	        	'description' => 'Cupidatat qui mollit dolor deserunt commodo minim nulla excepteur sunt.',
                'status' => 'Y',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
