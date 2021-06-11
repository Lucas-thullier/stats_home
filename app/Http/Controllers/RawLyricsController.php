<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Libs\RawLyricsExtract\GeniusExtractor;
use App\Models\RawLyrics;

class RawLyricsController extends Controller
{
    public function fillDatabase()
    {
        $rawLyricsPath = Storage::allFiles("lyrics/sources/genius");

        foreach ($rawLyricsPath as $rawLyricsPath) {
            $extractor = new GeniusExtractor($rawLyricsPath);
            $songsByArtist = $extractor->extract();
            foreach ($songsByArtist as $song) {
                RawLyrics::create($song);
            }
        }
    }

    public function getArtists()
    {
        dd(RawLyrics::getArtists());
    }
}
