<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use App\Models\Artist;

class RawLyricsController extends Controller
{
  public function fillDatabase()
  {
    $rawLyricsPath = Storage::allFiles("lyrics/sources/genius");

    foreach ($rawLyricsPath as $rawLyricsPath) {
      $lyricsExtractor = new \App\Http\Libs\RawLyricsExtract\GeniusExtractor(
        $rawLyricsPath
      );
      $artistExtractor = new \App\Http\Libs\ArtistExtract\GeniusExtractor(
        $rawLyricsPath
      );
      $artistData = $artistExtractor->extract();
      $artist = Artist::create($artistData);

      $songsByArtist = $lyricsExtractor->extract();
      foreach ($songsByArtist as $song) {
        $artist->rawLyrics()->create($song);
      }
    }
  }
}
