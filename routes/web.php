<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$redirects = [
    "shit-it-happened-again",
    "kanuu-state-of-things-2021",
    "the-last-two-months-kanuu-io",
    "micro-simplifications-in-laravel-pest",
    "quick-thoughts-laravel-magic-revelation-rollercoaster",
    "micro-simplifications-in-laravel-an-introduction",
    "domain-driven-module-service-providers",
    "sorta-kinda-domain-driven-approach-in-laravel",
    "on-keeping-it-simple",
    "my-social-media-hiatus",
];

foreach ($redirects as $redirect) {
    Route::redirect($redirect, "/articles/{$redirect}", 301);
}
