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
        Schema::connection('mysql_2')->table('team_members', function (Blueprint $table) {
            $table
                ->foreignIdFor(\App\Models\LegacyTeamMember::class)
                ->nullable(true)
                ->references('id')
                ->on('team_member_legacy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
