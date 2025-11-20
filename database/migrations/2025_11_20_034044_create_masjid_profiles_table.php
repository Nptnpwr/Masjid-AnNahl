<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masjid_profiles', function (Blueprint $table) {
            $table->id();

            // HERO
            $table->string('hero_subtitle')->nullable();

            // ABOUT
            $table->string('about_image')->nullable();
            $table->text('about_text_1')->nullable();
            $table->text('about_text_2')->nullable();

            // VISI MISI
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();

            // STATISTICS
            $table->integer('capacity')->nullable();
            $table->integer('year')->nullable();
            $table->string('routine_activities')->nullable();
            $table->string('public_info')->nullable();

            // CONTACT
            $table->string('whatsapp')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masjid_profiles');
    }
};
