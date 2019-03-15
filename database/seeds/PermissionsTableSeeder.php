<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'writing',
                'created_at' => '2019-03-15 07:39:25',
                'updated_at' => '2019-03-15 07:39:25',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'reading',
                'created_at' => '2019-03-15 06:54:44',
                'updated_at' => '2019-03-15 06:54:44',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'both',
                'created_at' => '2019-03-15 06:54:57',
                'updated_at' => '2019-03-15 06:54:57',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}