<?php

use App\Http\Controllers\RawLyricsController;
use App\Http\Controllers\ScraperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:api")->get("/user", function (Request $request) {
  return $request->user();
});

Route::get("/raw-data/action/fill-database", [
  RawLyricsController::class,
  "fillDatabase",
]);

Route::get("/raw-data/artists/all", [RawLyricsController::class, "getAuthors"]);

Route::get("/scraper/wikipedia/artists", [
  ScraperController::class,
  "scrapeArtists",
]);

Route::get("/scraper/genius/artist-songs", [
  ScraperController::class,
  "getRappeurByGenius",
]);
