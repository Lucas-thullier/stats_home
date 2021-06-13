<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtists extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    if (!Schema::hasTable("artists")) {
      Schema::create("artists", function (Blueprint $table) {
        $table->id();
        $table->string("name");
        $table->text("description")->nullable(true);
        $table->string("image_url", 500)->nullable(true);
        $table->string("genius_api_path")->nullable(true);
        $table->datetime("created_at");
        $table->datetime("updated_at");
      });
    }
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists("artists");
  }
}
