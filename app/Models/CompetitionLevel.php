<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CompetitionLevel extends Model

{
    use HasFactory;
    public $incrementing = false; 
    
    public function competitionCategory(){
        return $this->belongsTo("App\Models\CompetitionCategory");
    }
}
