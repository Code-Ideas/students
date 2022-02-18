<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(true);

            $table->string('api_token')->nullable()->unique();
            $table->string('device_token')->nullable()->unique();
            $table->enum('platform', ['web', 'app'])->default('web');

            $table->unsignedBigInteger('collage_id');
            $table->foreign('collage_id')->references('id')->on('collages')->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
        });
        //User::factory()->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
