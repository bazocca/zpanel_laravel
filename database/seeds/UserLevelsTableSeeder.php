<?php

use Illuminate\Database\Seeder;

class UserLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_levels')->delete();
        
        \DB::table('user_levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_name' => 'Super Admin',
                'status' => 1,
                'id_created' => 1,
                'id_modified' => 1,
                'created_at' => '2016-03-22 04:27:38',
                'updated_at' => '2016-03-22 04:27:38',
            ),
            1 => 
            array (
                'id' => 2,
                'level_name' => 'Admin',
                'status' => 1,
                'id_created' => 1,
                'id_modified' => 1,
                'created_at' => '2016-03-22 04:27:38',
                'updated_at' => '2016-03-22 04:27:38',
            ),
            2 => 
            array (
                'id' => 3,
                'level_name' => 'Regular User',
                'status' => 2,
                'id_created' => 1,
                'id_modified' => 1,
                'created_at' => '2016-03-22 04:27:38',
                'updated_at' => '2016-03-22 04:27:38',
            ),
        ));
        
        
    }
}
