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
        Schema::table('ticket_transactions', function (Blueprint $table) {
            // Drop column only if it exists
            if (Schema::hasColumn('ticket_transactions', 'transactionAmount')) {
                $table->dropColumn('transactionAmount');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
