<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('password',255);
            $table->boolean('is_active')->default(true);
            $table->date('dob');
            $table->enum('role',['user','admin']);
            $table->string('token_activation')->unique()->nullable();
            $table->timestamps();
        });
        // Set default password for existing records
        DB::table('users')->insert([
            'name' => 'Default User',
            'email' => 'default@example.com',
            'alamat' => 'Default Address',
            'no_telepon' => '1234567890',
            'password' => Hash::make('12345678'),
            'is_active' => true,
            'dob' => now(),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
