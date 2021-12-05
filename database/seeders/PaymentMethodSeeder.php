<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data               = new PaymentMethod();
        $data->type         = "Transfer Bank";
        $data->bank_id      = 1;
        $data->bank_logo    = "bca.png";
        $data->ref_name     = "SANIYA SHAFIRA";
        $data->ref_number   = "6110502832";
        $data->isShow       = 1;
        $data->save();
    }
}
