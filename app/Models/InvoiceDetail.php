<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    public function competitor()
    {
        return $this->belongsTo('App\Models\Competitor');
    }

    public function competitionCategory()
    {
        return $this->belongsTo('App\Models\CompetitionCategory');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
