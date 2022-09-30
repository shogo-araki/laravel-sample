<?php

namespace App\Providers;

use App\Gate\UserAccess;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Psr\Log\LoggerInterface;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate, LoggerInterface $logger)
    {
        $this->registerPolicies();
        $gate->define('user-access', new UserAccess());

        $gate->before(function ($user, $ability) use ($logger) {
            $logger->info($ability, [
                'user_id' => $user->getAuthIdentifer(),
            ]);
        });
    }
}
