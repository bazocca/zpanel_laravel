<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'full_name' => 'Oei Donny Winarto',
                'address' => 'Ngagel Madya, Surabaya',
                'phone' => '083837777297',
                'username' => 'Vermouth',
                'email' => 'oeidonny.winarto@gmail.com',
                'password' => '$2y$10$7UPqEKOM.Y6wx3ptq.rv2uEVcqPfsZT/GPRwtb0mRNPShyb4PfMOW',
                'status' => 1,
                'id_media_library' => 1,
                'id_user_level' => 1,
                'id_created' => 1,
                'id_modified' => 1,
                'remember_token' => NULL,
                'created_at' => '2016-03-22 04:27:38',
                'updated_at' => '2016-03-22 04:27:38',
            ),
        ));
        
        
    }
}
