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
    if (!Schema::hasColumn('reservations', 'status')) {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('status')->default('Pending')->notNull();
        });
    }
}

public function down(): void
{
    if (Schema::hasColumn('reservations', 'status')) {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

}

};
