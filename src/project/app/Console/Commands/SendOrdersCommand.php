<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\CarbonImmutable;
use App\UseCases\SendOrdersUseCase;
use Illuminate\Log\Logger;
use Psr\Log\LoggerInterface;

class SendOrdersCommand extends Command
{
    private $useCase;
    private $logger;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-orders {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '購入情報を送信する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SendOrdersUseCase $useCase, LoggerInterface $logger)
    {
        parent::__construct();

        $this->usecase = $useCase;
        $this->logger = $logger;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->logger->info('__METHOD__' . '  ' . 'start');

        $date = $this->argument('date');
        $targetDate = CarbonImmutable::createFromFormat('Ymd', $date);

        $this->logger->info('TargetDate: ' . $date);

        $count = $this->useCase->run($targetDate);

        $this->logger->info('__METHOD__' . '  ' . 'done sent_count: ' . $count);
        $this->info('Send Orders');
        return 0;
    }
}
