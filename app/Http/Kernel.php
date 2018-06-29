<?php

namespace App\Http;

use App\Http\Middleware\AboutUsAdvertMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CandidateAndGuestManagerMiddleware;
use App\Http\Middleware\CheckSessionAjax;
use App\Http\Middleware\ClearanceMiddleware;
use App\Http\Middleware\ContactUsMailSubManagerMiddleware;
use App\Http\Middleware\CooperateCompanyInfoMiddleware;
use App\Http\Middleware\JobAndRelateManagerMiddleware;
use App\Http\Middleware\StoryAndServiceManagerMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
//             \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'isAdmin' => AdminMiddleware::class,
        'clearance' => ClearanceMiddleware::class,
        'contact_advert' => AboutUsAdvertMiddleware::class,
        'check_session' => CheckSessionAjax::class,
        'isCandidateGuestManager' => CandidateAndGuestManagerMiddleware::class,
        'isContactUsMailSubManager' => ContactUsMailSubManagerMiddleware::class,
        'isCoopCompanyInfoManager' => CooperateCompanyInfoMiddleware::class,
        'isJobAndRelateManager' => JobAndRelateManagerMiddleware::class,
        'isStoryServiceManager' => StoryAndServiceManagerMiddleware::class
    ];
}
