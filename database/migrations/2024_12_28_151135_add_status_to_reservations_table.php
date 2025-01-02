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
    Schema::table('reservations', function (Blueprint $table) {
        if (!Schema::hasColumn('reservations', 'status')) {
            $table->string('status')->default('Pending');
        }
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
