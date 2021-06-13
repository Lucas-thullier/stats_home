<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function rawLyrics()
  {
    return $this->hasMany(RawLyrics::class);
  }

  public static function getById($id)
  {
    return self::with("RawLyrics")
      ->where("id", $id)
      ->get();
  }
}
