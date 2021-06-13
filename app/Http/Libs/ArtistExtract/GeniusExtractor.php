<?php

namespace App\Http\Libs\ArtistExtract;

use Illuminate\Support\Facades\Storage;

class GeniusExtractor extends AbstractExtractor
{
  public function extract()
  {
    $content = $this->loadFile();

    $extractedArtist = [];
    $extractedArtist["name"] = $this->extractName($content);
    $extractedArtist["description"] = $this->extractDescription($content);
    $extractedArtist["image_url"] = $this->extractImageUrl($content);
    $extractedArtist["genius_api_path"] = $this->extractGeniusApiPath($content);

    return $extractedArtist;
  }

  private function loadFile()
  {
    $content = Storage::get($this->filepath);
    $content = json_decode($content, true);

    return $content;
  }

  private function extractName($content)
  {
    return $content["name"];
  }

  private function extractDescription($content)
  {
    $description = $content["description"]["plain"];

    return $description == "?" ? null : $description;
  }

  private function extractImageUrl($content)
  {
    return $content["image_url"];
  }

  private function extractGeniusApiPath($content)
  {
    return $content["api_path"];
  }
}
