<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mountain;

class MountainModelSeeder extends Seeder
{
    public function run()
    {
        Mountain::create([
            'name' => 'Matterhorn',
            'height' => 4478,
            'belongsToRange' => true,
            'firstClimbDate' => '1865-07-14',
            'continent' => 'Europe',
        ]);

        Mountain::create([
            'name' => 'Denali',
            'height' => 6190,
            'belongsToRange' => true,
            'firstClimbDate' => '1913-06-07',
            'continent' => 'America',
        ]);

        Mountain::create([
            'name' => 'Mount Fuji',
            'height' => 3776,
            'belongsToRange' => false,
            'firstClimbDate' => '663-08-01',
            'continent' => 'Asia',
        ]);
    }
}
