<?php

namespace App\Http\Libs\RawLyricsExtract;

class AbstractExtractor
{
    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    private function loadFile()
    {
        return;
    }

    private function extractArtist()
    {
        return;
    }

    private function extractTitle()
    {
        return;
    }

    private function extractLyrics()
    {
        return;
    }

    private function extractSongImage()
    {
        return;
    }

    private function extractAlbum()
    {
    }

    private function extractIsLive()
    {
        return;
    }

    private function extractIsInstrumental()
    {
        return;
    }

    private function extractYoutubeUrl()
    {
        return;
    }

    private function extractStyle()
    {
        return;
    }

    public function extract()
    {
        return;
    }
}
