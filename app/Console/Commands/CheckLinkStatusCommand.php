<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;

class CheckLinkStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:check-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the status of links and updates the relevant records';

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

    }
}
