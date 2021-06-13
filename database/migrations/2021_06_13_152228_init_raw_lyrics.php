<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitRawLyrics extends Migration
{
  public function up()
  {
    if (!Schema::hasTable("raw_lyrics")) {
      Schema::create("raw_lyrics", function (Blueprint $table) {
        $table->id();
        $table->foreignId("artist_id")->constrained();
        $table->string("title", "500");
        $table->string("author");
        $table->text("lyrics");
        $table->string("album")->nullable(true);
        $table->string("is_instrumental")->nullable(true);
        $table->string("is_live")->nullable(true);
        $table->string("youtube_url")->nullable(true);
        $table->string("image_url")->nullable(true);
        $table->string("style")->nullable(true);
        $table->datetime("created_at");
        $table->datetime("updated_at");
      });
    }
  }

  public function down()
  {
    Schema::dropIfExists("raw_lyrics");
  }
}
