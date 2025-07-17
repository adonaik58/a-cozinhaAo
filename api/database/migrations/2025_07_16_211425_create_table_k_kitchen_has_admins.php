<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('k_kitchen_has_admins', function (Blueprint $table) {
            $table->unsignedBigInteger('kitchen_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('kitchen_id')->references('id')->on('k_kitchen');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['kitchen_id', 'user_id'], 'k_kitchen_has_admins_pk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('k_kitchen_has_admins');
    }
};
