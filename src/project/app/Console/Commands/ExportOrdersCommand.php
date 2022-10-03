<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\UseCases\ExportOrdersUseCase;
use Carbon\CarbonImmutable;

class ExportOrdersCommand extends Command
{
    private $useCase;

    public function __construct(ExportOrdersUseCase $useCase)
    {
        parent::__construct();
        $this->useCase = $useCase;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-orders {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'export purchased history';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $date = $this->argument('date');
        $targetdate = CarbonImmutable::createFromFormat('Ymd', $date);
        $tsv = $this->useCase->run($targetdate);
        echo $tsv;

        return 0;
    }
}
