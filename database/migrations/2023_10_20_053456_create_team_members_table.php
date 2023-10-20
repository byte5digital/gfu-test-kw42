<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql_2')->create('team_members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->string('position', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
