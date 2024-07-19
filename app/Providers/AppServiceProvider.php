<?php

namespace App\Providers;

use App\Repositories\Agent\AgentRepository;
use App\Repositories\Agent\AgentRepositoryInterface;
use App\Repositories\DelayReport\DelayReportRepository;
use App\Repositories\DelayReport\DelayReportRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Vendor\VendorRepository;
use App\Repositories\Vendor\VendorRepositoryInterface;
use App\Services\DelayReport\DelayReportService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(DelayReportRepositoryInterface::class, DelayReportRepository::class);
        $this->app->bind(AgentRepositoryInterface::class, AgentRepository::class);
        $this->app->bind(VendorRepositoryInterface::class, VendorRepository::class);
        $this->app->bind(DelayReportService::class, function ($app) {
            return new DelayReportService($app->make(DelayReportRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
