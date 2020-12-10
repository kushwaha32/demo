<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('navchild_id');
            $table->string('nvparent');
            $table->text('tile');
            $table->string('auther_name');
            $table->boolean('status');
            $table->string('img');
            $table->string('iframe')->nullable();
            $table->boolean('trending');
            $table->boolean('img_gallery')->default(0);
            $table->boolean('img_gallery_main')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('contents');
    }
}
