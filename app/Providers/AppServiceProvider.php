<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
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
        View::addNamespace('errors', resource_path('views/errors'));
        // Share categories and languages across all views
        View::composer('*', function ($view) {
            $currentLocale = App::getLocale();
            $language =  Language::where('code', $currentLocale)->first();
            $languageId = $language ? $language->id : 10; // fallback to 10 if not found
            $view->with('navcategories', Category::with('language')
                ->select('id', 'name', 'slug', 'image', 'language_id')
                ->where('language_id', $languageId)
                ->get());
            $view->with('langs', language::orderBy('created_at', 'asc')->get());
            $view->with('currentLang', Session::get('language', 'EN'));
        });

        $locale = request()->segment(1);
    // Get all language codes from the database
    $availableLocales = language::pluck('code')->toArray();

    if (!in_array($locale, $availableLocales)) {
        $locale = 'en'; // Set your default locale
    }
    App::setLocale($locale);
    }
}
