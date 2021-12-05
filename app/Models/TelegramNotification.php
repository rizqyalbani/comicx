<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramNotification extends Model
{
    use HasFactory;

    const STATUS_ACTIVE     = 1;
    const STATUS_DRAFT      = 0;
    const STATUS_DELETE     = -1;

    const TITLE_NEW_USER     = '[USER BARU]';
    const MESSAGE_NEW_USER     = ' berhasil mendaftar di web COMIC IX';
    
    const TITLE_NEW_QUESTION     = '[PERTANYAAN BARU]';

    const TITLE_NEW_PAYMENT     = '[PEMBAYARAN BARU]';

    const TITLE_NEW_COMPETITOR    = '[PESERTA BARU]';

    const TYPE_NEW_USER     = 1;
    const TYPE_NEW_QUESTION = 2;
    const TYPE_NEW_COMPETITOR = 3;
    const TYPE_NEW_PAYMENT = 4;
    const TYPE_NEW_UPLOAD = 5;

    public function scopeIsDraft($query)
    {
        return $query->where('status', '=', static::STATUS_DRAFT);
    }
}
