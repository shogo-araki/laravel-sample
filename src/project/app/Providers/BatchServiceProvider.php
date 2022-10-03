<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\UseCases\SendOrdersUseCase;
use App\Console\Commands\SendOrdersCommand;
use Illuminate\Log\LogManager;
use App\Services\ExportOrderService;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;

class BatchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            SendOrdersUseCase::class,
            function () {
                $service = $this->app->make(ExportOrderService::class);
                $guzzle = new Client(
                    [
                        'handler' => tap(
                            HandlerStack::create(),
                            function (HandlerStack $v) {
                                $logger = app(LogManager::class);
                                $v->push(
                                    Middleware::log(
                                        $logger->driver('send-orders'),
                                        new MessagefromFormatter(
                                            ">>>\n{req_headers}\n<<<\n{res_headers}\n\n{res_body}"
                                        )
                                    )
                                );
                            }
                        )
                    ]
                );
                return new SendOrdersUseCase($service, $guzzle);
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
