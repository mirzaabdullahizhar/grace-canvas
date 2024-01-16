<?php

namespace App\Providers;

use app\Contracts\DefaultMethods;
use App\Models\TestModel;
use App\Models\TestModel2;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\User;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DefaultMethods::class, function ($app) {
            return new TestModel2();
        });

        $this->app->bind(DefaultMethods::class, function ($app) {
            return new TestModel();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::useCustomerModel(User::class);

        Response::macro('macroJson', function (array $Data = [], int $Success = null, string $Message = '', int $HttpCode = 500) {
            return Response::make([
                'data' => $Data,
                'success' => $Success,
                'message' => $Message
            ], $HttpCode);
        });

        Response::macro('macroJsonExtention', function (array $Data = [], string $ExtentionKey, array $ExtentionData, int $Success = null, string $Message = '', int $HttpCode = 500) {
            return Response::make([
                'data' => $Data,
                $ExtentionKey => $ExtentionData,
                'success' => $Success,
                'message' => $Message
            ], $HttpCode);
        });

        Response::macro('macroView', function (string $View, int $HttpCode = 500, array $ContentType) {
            return Response::make($View, $HttpCode, $ContentType);
        });

        // The following function is used to translate the whole app according to the user set local language
        // $this->app property provides access to our laravel app
        // ->bind method is used to register a new binding e.g a class or a function
        $this->app->bind('googleTranslator', function ($App, $Parameters) {
            // If the langugae == English then we don't have to translate
            if (app()->getLocale() === 'en') return $Parameters['string'];
            // Otherwise we will run the Google translator
            return GoogleTranslate::trans($Parameters['string'], app()->getLocale());
        });
    }
}
