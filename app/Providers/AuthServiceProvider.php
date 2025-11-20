<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Graduate;
use App\Policies\PagePolicy;
use App\Policies\GraduatePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Page::class => PagePolicy::class,
        Graduate::class => GraduatePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}