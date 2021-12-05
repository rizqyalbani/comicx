<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionType;

class ComTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data               = new CompetitionType();
        $data->code         = 'AZ';
        $data->name         = 'Adzan';
        $data->slug         = 'adzan';
        $data->class        = 'SD';
        $data->image        = 'adzan.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'DAI';
        $data->name         = "Da'i";
        $data->slug         = 'dai';
        $data->class        = 'SD, SMP, SMA';
        $data->image        = 'dai.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'PR';
        $data->name         = 'Pop Religi';
        $data->slug         = 'pop-religi';
        $data->class        = 'SMP, SMA';
        $data->image        = 'pop-religi.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'TW';
        $data->name         = 'Tilawah';
        $data->slug         = 'tilawah';
        $data->class        = 'SMP, SMA';
        $data->image        = 'tilawah.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'PI';
        $data->name         = 'Puisi Islami';
        $data->slug         = 'puisi-islami';
        $data->class        = 'SMP, SMA';
        $data->image        = 'puisi-islami.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'SMI';
        $data->name         = "Short Movie Islami";
        $data->slug         = 'short-movie-islami';
        $data->class        = 'SMA';
        $data->image        = 'short-movie-islami.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'DPI';
        $data->name         = 'Desain Poster Islami';
        $data->slug         = 'desain-poster-islami';
        $data->class        = 'SMA';
        $data->image        = 'desain-poster-islami.jpg';
        $data->save();

        $data               = new CompetitionType();
        $data->code         = 'HDR';
        $data->name         = "Hadrah";
        $data->slug         = 'hadrah';
        $data->class        = 'Anak Sekolah';
        $data->image        = 'hadrah.jpg';
        $data->save();
    }
}
