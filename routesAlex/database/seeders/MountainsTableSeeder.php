<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MountainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mountains')->insert([
            [
                'name' => 'Mount Everest',
                'height' => 8848,
                'belongsToRange' => true,
                'firstClimbDate' => '1953-05-29',
                'continent' => 'Asia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kilimanjaro',
                'height' => 5895,
                'belongsToRange' => false,
                'firstClimbDate' => '1889-10-06',
                'continent' => 'Afrika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mont Blanc',
                'height' => 4808,
                'belongsToRange' => true,
                'firstClimbDate' => '1786-08-08',
                'continent' => 'Europe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
