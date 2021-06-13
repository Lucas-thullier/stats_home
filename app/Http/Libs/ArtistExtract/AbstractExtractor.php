<?php

namespace App\Http\Libs\ArtistExtract;

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

  private function extractName()
  {
    return;
  }

  private function extractDescription()
  {
    return;
  }

  private function extractImageUrl()
  {
    return;
  }

  private function extractGeniusApiPath()
  {
  }

  public function extract()
  {
    return;
  }
}
