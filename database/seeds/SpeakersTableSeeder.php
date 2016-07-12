<?php

use Illuminate\Database\Seeder;

class SpeakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('speakers')->insert(
            array(
                'name' => 'Ash Ketchum',
                'age' => 10
            )
        );
    }
}
