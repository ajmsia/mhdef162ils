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
        Schema::create('requests', function (Blueprint $table) {
            $table->id('requestID');
            $table->timestamps();
            $table->softDeletes();
            $table->string('userFirstName');
            $table->string('userLastName');
            $table->string('userMiddleName')->nullable();
            $table->string('upmail')->unique();
            $table->string('college');
            $table->string('userType');
            $table->text('tuklaslink');
            $table->date('requestDate');
            $table->time('requestTime');
            $table->text('purpose');
            $table->string('status')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
