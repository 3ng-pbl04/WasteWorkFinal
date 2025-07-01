<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('admins', function (Blueprint $table) {
        $table->id();
        $table->string('username')->unique();
        $table->string('email')->unique()->nullable();
        $table->string('password');
        $table->enum('role', ['trash2move', 'ecoahto','ceoT2m','ecoEco']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
