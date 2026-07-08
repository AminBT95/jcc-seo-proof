<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicSeoController;
use App\Http\Controllers\AdminSeoApiController;
use App\Http\Controllers\SeoSitemapController;

Route::get('/robots.txt', [SeoSitemapController::class, 'robots']);
Route::get('/sitemap.xml', [SeoSitemapController::class, 'index']);
Route::get('/sitemap-pages.xml', [SeoSitemapController::class, 'pages']);
Route::get('/sitemap-blog.xml', [SeoSitemapController::class, 'blog']);
Route::get('/sitemap-offres.xml', [SeoSitemapController::class, 'offres']);
Route::get('/sitemap-realisations.xml', [SeoSitemapController::class, 'realisations']);

Route::prefix('api')->group(function () {
    Route::get('/items', [AdminSeoApiController::class, 'index']);
    Route::post('/items', [AdminSeoApiController::class, 'store']);
    Route::put('/items/{item}', [AdminSeoApiController::class, 'update']);
    Route::delete('/items/{item}', [AdminSeoApiController::class, 'destroy']);
});

Route::get('/admin', function () {
    return view('seo-admin');
});

Route::get('/', [PublicSeoController::class, 'home']);
Route::get('/blog', [PublicSeoController::class, 'listing'])->defaults('kind', 'blog');
Route::get('/offres', [PublicSeoController::class, 'listing'])->defaults('kind', 'offres');
Route::get('/realisations', [PublicSeoController::class, 'listing'])->defaults('kind', 'realisations');

Route::get('/{kind}/{slug}', [PublicSeoController::class, 'show'])
    ->where('kind', 'blog|offres|realisations');

Route::get('/{slug}', [PublicSeoController::class, 'page']);
