<?php

namespace App\Console\Commands;

use App\Models\PrizeMoney;
use Illuminate\Console\Command;

class SendMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'money:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $model = new PrizeMoney();
        $data = $model->where('is_sent', '=', 'false')->get();
        foreach ($data as $item) {

            //тут должна быть заглушка для api банка

            $item->is_sent = true;
            $item->save();

        }
        return 0;
    }
}
