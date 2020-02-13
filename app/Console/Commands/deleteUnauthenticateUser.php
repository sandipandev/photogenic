<?php

namespace App\Console\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class deleteUnauthenticateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'unthenticateuser:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Cron Job Will Delete All Unathenticate User';

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
     * @return mixed
     */
    public function handle()
    {   
        $x = DB::table('users')->where([['created_at', '<', 
        Carbon::now()->subMinutes(5)->toDateTimeString()],['confirmed','=',0]])->delete();
        dd($x);
    }
}
