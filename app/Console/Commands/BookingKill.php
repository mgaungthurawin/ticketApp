<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BookingKill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:kill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will kill the expire booking';

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
        // \Log::info('Hello! I am there @ ' . \Carbon\Carbon::now());
        bookingkill();
    }
}