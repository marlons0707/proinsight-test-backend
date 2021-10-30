<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Marlon Josué Saravia',
	        	'nit' => '89466896',
                'nit_name' => 'Marlon Saravia',
                'cellphone' => '3522-8670',
                'phone' => '6636-0011',
                'email' => 'marlons0707@gmail.com',
                'fax' => '22334455',
                'address' => '14 av. 2-85 Z1 SMP Guatemala',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mayra Gregorio Molina',
	        	'nit' => '89466897',
                'nit_name' => 'Mayra Gregorio',
                'cellphone' => '3522-8671',
                'phone' => '6636-5698',
                'email' => 'maygre@gmail.com',
                'fax' => '22334456',
                'address' => '18 calle Guatemala',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Jessica García',
	        	'nit' => '89466844',
                'nit_name' => 'Jessica Saravia',
                'cellphone' => '3522-4565',
                'phone' => '6636-7878',
                'email' => 'jess123@gmail.com',
                'fax' => '22334454',
                'address' => '14 av. 2-85 Z1 SMP Guatemala',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Abner Francisco Pérez',
	        	'nit' => '89464568',
                'nit_name' => 'Abner Pérez',
                'cellphone' => '3522-8123',
                'phone' => '6636-7896',
                'email' => 'afperez@gmail.com',
                'fax' => '223335789',
                'address' => 'Catalina 14 calle zona 20',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Victor Colón',
	        	'nit' => 'CF',
                'nit_name' => 'Victor Colón',
                'cellphone' => '3522-8670',
                'phone' => '6636-3311',
                'email' => 'vcolon0707@gmail.com',
                'fax' => '22334455',
                'address' => 'Praderas del sur',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Diana Victoria Méndez',
	        	'nit' => '89468521',
                'nit_name' => 'Diana Méndez',
                'cellphone' => '5555-8670',
                'phone' => '7896-0011',
                'email' => 'mendezdiana0707@gmail.com',
                'fax' => '69854455',
                'address' => '19 av. 212 Z1 SMP Guatemala',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Karla Mazariegos',
	        	'nit' => 'CF',
                'nit_name' => 'Karla Mazariegos',
                'cellphone' => '7895-5445',
                'phone' => '1111-0011',
                'email' => 'mazakarlas0707@gmail.com',
                'fax' => '78986554',
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Kenia Marisol Zepeda',
	        	'nit' => '89469999',
                'nit_name' => 'Kenia Zepeda',
                'cellphone' => '4562-8670',
                'phone' => null,
                'email' => null,
                'fax' => null,
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ricardo Elliu',
	        	'nit' => '78656896',
                'nit_name' => 'Elliu Ramirez',
                'cellphone' => '1122-8670',
                'phone' => null,
                'email' => null,
                'fax' => null,
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Donaldo Luna',
	        	'nit' => 'CF',
                'nit_name' => 'Abner Luna',
                'cellphone' => '5698-1670',
                'phone' => null,
                'email' => null,
                'fax' => null,
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Erick Gregorio',
	        	'nit' => '12366896',
                'nit_name' => 'Erick Gregorio',
                'cellphone' => '3522-8888',
                'phone' => null,
                'email' => null,
                'fax' => null,
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'José Luis Chacón',
                'nit' => 'CF',
                'nit_name' => 'José Chacón',
                'cellphone' => null,
                'phone' => '6636-0000',
                'email' => 'jl@gmail.com',
                'fax' => null,
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lilian Gregorio',
	        	'nit' => '12345896',
                'nit_name' => 'Lilian Gregorio',
                'cellphone' => '5566-8670',
                'phone' => null,
                'email' => null,
                'fax' => null,
                'address' => '16 av. 1-88 Z1 SMP Petapa',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mishel Bracamonte',
	        	'nit' => '123566596',
                'nit_name' => 'Mishel Bracamonte',
                'cellphone' => '1235-9875',
                'phone' => null,
                'email' => null,
                'fax' => null,
                'address' => '12 Z1 SMP Guatemala',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Katy Barrera',
	        	'nit' => '78945623',
                'nit_name' => 'Katy Barrera',
                'cellphone' => '3522-8670',
                'phone' => '5566-0011',
                'email' => 'kmarcela@gmail.com',
                'fax' => null,
                'address' => null,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
