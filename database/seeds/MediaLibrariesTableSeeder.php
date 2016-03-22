<?php

use Illuminate\Database\Seeder;

class MediaLibrariesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media_libraries')->delete();
        
        \DB::table('media_libraries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'noimage',
                'type' => 'jpg',
                'url' => 'img/noimage.jpg',
                'id_created' => 1,
                'created_at' => '2016-03-22 04:27:38',
                'updated_at' => '2016-03-22 04:27:38',
            ),
        ));
        
        
    }
}
