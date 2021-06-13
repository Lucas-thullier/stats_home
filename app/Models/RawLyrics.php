<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawLyrics extends Model
{
  use HasFactory;

  protected $guarded = [];

  public static function getAuthors()
  {
    return self::select("author")
      ->distinct()
      ->get();
  }
}
