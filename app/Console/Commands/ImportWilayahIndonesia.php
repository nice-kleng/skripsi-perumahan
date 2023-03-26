<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportWilayahIndonesia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:wilayah';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Wilayah Indonesia';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            DB::unprepared(file_get_contents('database/migrations/wilayah.sql'));
            $this->info('import success');
        } catch (\Throwable $th) {
            $this->info('import error');
        }
        // return Command::SUCCESS;
    }
}
