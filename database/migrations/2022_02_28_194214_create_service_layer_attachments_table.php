<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceLayerAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_layer_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('path');
            $table->enum('type', ['image', 'file', 'video'])->default('image');
            $table->text('video_url')->nullable();
            $table->unsignedBigInteger('service_layer_id');
            $table->foreign('service_layer_id')->references('id')->on('service_layers')->onDelete('cascade');
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
        Schema::dropIfExists('service_layer_attachments');
    }
}
