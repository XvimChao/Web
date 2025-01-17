<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Report;
use App\Policies\ReportPolicy;
use App\Models\ReportType;
use App\Policies\ReportTypePolicy;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use App\Models\Prisoner;
use App\Policies\PrisonerPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Report' => 'App\Policies\ReportPolicy',
        'App\Models\ReportType' => 'App\Policies\ReportTypePolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\Prisoner' => 'App\Policies\PrisonerPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies(); 
    }
}
