<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LadderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array(
    		array('name' => 'Sydney FC', 'position' => 1),
    		array('name' => 'Newcastle Jets', 'position' => 2),
    		array('name' => 'Melbourne City FC', 'position' => 3),
    		array('name' => 'Adelaide United', 'position' => 4),
    		array('name' => 'Melbourne Victory', 'position' => 5),
    		array('name' => 'Perth Glory', 'position' => 6),
    		array('name' => 'Central Coast Mariners', 'position' => 7),
    		array('name' => 'Western Sydney Wanderers FC', 'position' => 8),
    		array('name' => 'Brisbane Roar FC', 'position' => 9),
    		array('name' => 'Wellington Phoenix', 'position' => 10)
		);

        DB::table('ladder')->insert($data);
    }
}
