<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionGender;

class ComGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data               = new CompetitionGender();
        $data->id           = 'U';
        $data->name         = 'Semua gender';
        $data->show         = 0;
        $data->save();

        $data               = new CompetitionGender();
        $data->id           = 'PA';
        $data->name         = 'Putra';
        $data->save();

        $data               = new CompetitionGender();
        $data->id           = 'PI';
        $data->name         = 'Putri';
        $data->save();
    }
}
