<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(
            array(
                'name' => 'PHP Conference 2014',
                'place' => 'UNIFIEO - SP',
                'description' => 10,
                'start_date' => 10,
                'end_date' => 10,
            )
        );

        DB::table('events')->insert(
            array(
                'name' => 'PHP Conference 2015',
                'age' => 10
            )
        );

        DB::table('events')->insert(
            array(
                'name' => 'PHP Conference 2016',
                'age' => 10
            )
        );
    }
}
