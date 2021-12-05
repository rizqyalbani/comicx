<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TelegramNotification;
use App\Supports\TelegramBot;

class TelegramNotif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:notif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Telegram Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $models = TelegramNotification::isDraft()->get();
        $tele = new TelegramBot();
        
        foreach($models as $item) {
            $tele->sendMessage($item->name."\n".$item->description);
            $item->status = TelegramNotification::STATUS_ACTIVE;
            $item->save();
        }

        return 0;
    }
}
