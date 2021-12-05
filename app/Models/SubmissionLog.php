<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Time;

class SubmissionLog extends Model
{
    use Time;
    use HasFactory;
}
