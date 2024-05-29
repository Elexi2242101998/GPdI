<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_profil_pendeta', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendeta');
            $table->string('foto_pendeta');
            $table->string('moto');
            $table->string('instagram');
            $table->string('wa');
            $table->string('facebook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_profil_pendeta');
    }
};
