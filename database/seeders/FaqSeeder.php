<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data               = new Faq();
        $data->user_id      = 1;
        $data->answer_by    = 1;
        $data->status       = 1;
        $data->question     = "Apa itu COMIC?";
        $data->answer       = "COMIC adalah singkatan dari Competition of Islamic Creativity, merupakan ajang perlombaan yang diadakan oleh UKM MCOS STIKOM Bali untuk berkompetisi dalam berbagai bidang dalam Islam. COMIC diikuti oleh peserta dari berbagai jenjang seperti SD, SMP dan SMA atau Sederajat se-Bali, Jawa dan Lombok.";
        $data->save();
    }
}
