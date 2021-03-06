<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_projet', function (Blueprint $table) {
            $table->unsignedInteger('projet_id');
            $table->unsignedInteger('picture_id');

            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('CASCADE');
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('picture_projet');
    }
}
