<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionLevel;

class ComLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data               = new CompetitionLevel();
        $data->id           = 'SD';
        $data->name         = 'SD/MI';
        $data->save();

        $data               = new CompetitionLevel();
        $data->id           = 'SMP';
        $data->name         = 'SMP/Mts';
        $data->save();

        $data               = new CompetitionLevel();
        $data->id           = 'SMA';
        $data->name         = 'SMA/SMK/MA';
        $data->save();

        $data               = new CompetitionLevel();
        $data->id           = 'Sekolah';
        $data->name         = 'Sekolah';
        $data->show         = 0;
        $data->save();
    }
}
