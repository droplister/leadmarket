<?php

namespace App\Console\Commands;

use App\Lead;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class InsertRows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:rows {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert rows into table.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $c = $this->argument('count');
        for ($i=0; $i < $c; ++$i) {
            factory(Lead::class)->create();
            $this->comment('Lead Created');
        }
        $this->comment('Completed');
    }
}
