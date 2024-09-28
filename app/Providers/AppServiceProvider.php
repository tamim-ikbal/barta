<?php

namespace App\Providers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RedirectResponse::macro('success', function (string $message) {
            return $this->with('toast', [
                'type' => 'success',
                'message' => $message
            ]);
        });

        RedirectResponse::macro('error', function (string $message = null) {
            if (!$message) {
                $message = __('Something went wrong!');
            }

            return $this->with('toast', [
                'type' => 'error',
                'message' => $message
            ]);
        });
    }
}
