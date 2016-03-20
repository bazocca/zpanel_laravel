<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User, App\Models\UserLevel;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'id' => 1,
			'full_name' => 'Oei Donny Winarto',
			'address' => 'Ngagel Madya, Surabaya',
			'phone' => '083837777297',
			'username' => 'Vermouth',
			'email' => 'oeidonny.winarto@gmail.com',
			'password' => bcrypt('123456'),
			'status' => 1,
			'id_user_level' => 1,
			'id_created' => 1,
			'id_modified' => 1,
			'id_media_library' => 0
		]);

		UserLevel::create([
			'id' => 1,
			'level_name' => 'Super Admin',
			'status' => 1,
			'id_created' => 1,
			'id_modified' => 1
		]);
		
		UserLevel::create([
			'id' => 2,
			'level_name' => 'Admin',
			'status' => 1,
			'id_created' => 1,
			'id_modified' => 1
		]);

		UserLevel::create([
			'id' => 3,
			'level_name' => 'Regular User',
			'status' => 2,
			'id_created' => 1,
			'id_modified' => 1
		]);
		
		
	}

}
