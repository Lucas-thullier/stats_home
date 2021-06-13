<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\RawLyricsController;
use App\Http\Controllers\ScraperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:api")->get("/user", function (Request $request) {
  return $request->user();
});

Route::get("/raw-data/action/fill-database", [
  RawLyricsController::class,
  "fillDatabase",
]);

Route::get("/raw-data/artists/all", [ArtistController::class, "getAll"]);
// Route::get("/raw-data/artists/{id}", [ArtistController::class, "getArtist"]);

Route::get("/scraper/wikipedia/artists", [
  ScraperController::class,
  "scrapeArtists",
]);

Route::get("/scraper/genius/artist-songs", [
  ScraperController::class,
  "getRappeurByGenius",
]);
