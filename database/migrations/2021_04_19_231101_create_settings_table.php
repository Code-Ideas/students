<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->text('site_description');
            $table->longText('publication_policy');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable()->default('24.774265');
            $table->string('longitude')->nullable()->default('46.738586');
            $table->timestamps();
        });
        Setting::create(['site_name' => 'خدمات الطلاب', 'site_description' => 'موقع لخدمات الطلاب بجامعة بورسعيد',
            'email' => 'info@codeideas.dev', 'phone' => '01020304050', 'whatsapp' => '+201020304050',
            'publication_policy' => 'شروط النشر']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
