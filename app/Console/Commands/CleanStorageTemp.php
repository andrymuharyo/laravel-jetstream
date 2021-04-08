<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class CleanStorageTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:storage-temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean storage temporary folder scheduler';

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
        $directory = 'tmp';
        Storage::deleteDirectory($directory);
        Storage::makeDirectory($directory, 755 , true);
    }
}
