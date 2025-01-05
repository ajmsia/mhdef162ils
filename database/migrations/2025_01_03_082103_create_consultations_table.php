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
        if (!Schema::hasTable('consultations')) {
            Schema::create('consultations', function (Blueprint $table) {
                $table->id();
                $table->string('fullname');
                $table->string('mail');
                $table->string('contact')->nullable();
                $table->date('reserveDate');
                $table->time('reserveTime');
                $table->text('purpose');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
