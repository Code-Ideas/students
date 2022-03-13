<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['super_admin', 'admin', 'supervisor', 'staff'])->default('supervisor');
            $table->unsignedBigInteger('collage_id')->nullable();
            $table->foreign('collage_id')->references('id')->on('collages')->onDelete('set null');
            $table->unsignedBigInteger('admin_department_id')->nullable();
            $table->foreign('admin_department_id')->references('id')->on('admin_departments')->onDelete('set null');
            $table->boolean('active')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
