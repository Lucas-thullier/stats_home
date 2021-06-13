<?php

namespace App\Http\Libs\RawLyricsExtract;

use Illuminate\Support\Facades\Storage;

class GeniusExtractor extends AbstractExtractor
{
    public function extract()
    {
        $content = $this->loadFile();
        $allSongs = [];
        foreach ($content["songs"] as $song) {
            if ($song["lyrics"] && $song["title"]) {
                $extractedSongs = [];
                $extractedSongs["author"] = $this->extractAuthor($song);
                $extractedSongs["title"] = $this->extractTitle($song);
                $extractedSongs["lyrics"] = $this->extractLyrics($song);
                $extractedSongs["image_url"] = $this->extractSongImage($song);
                $extractedSongs["album"] = $this->extractAlbum($song);
                $extractedSongs["is_live"] = $this->extractisLive($song);
                $extractedSongs[
                    "is_instrumental"
                ] = $this->extractisInstrumental($song);
                $extractedSongs["youtube_url"] = $this->extractYoutubeUrl(
                    $song
                );
                $extractedSongs["style"] = $this->extractStyle($song);
                $allSongs[] = $extractedSongs;
            }
        }
        return $allSongs;
    }

    private function loadFile()
    {
        $content = Storage::get($this->filepath);
        $content = json_decode($content, true);

        return $content;
    }

    private function extractAuthor()
    {
        $pathinfo = pathinfo($this->filepath);
        $author = $pathinfo["filename"];

        return $author;
    }

    private function extractTitle($song)
    {
        $title = $song["title_with_featured"] ?? ($song["title"] ?? null);
        return $title;
    }

    private function extractLyrics($song)
    {
        return $song["lyrics"];
    }

    private function extractSongImage($song)
    {
        return $song["song_art_image_url"] ??
            ($song["header_image_url"] ?? null);
    }

    private function extractAlbum($song)
    {
        return;
    }

    private function extractIsLive($song)
    {
        return;
    }

    private function extractIsInstrumental($song)
    {
        return;
    }

    private function extractYoutubeUrl($song)
    {
        // $this->youtubeUrl =
        return;
    }

    private function extractStyle($song)
    {
        return;
    }
}
