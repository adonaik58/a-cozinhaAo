<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('table_k_kitchen_has_company', function (Blueprint $table) {
            $table->unsignedBigInteger('kitchen_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('kitchen_id')->references('id')->on('k_kitchen');
            $table->foreign('company_id')->references('id')->on('c_company');
            $table->primary(['kitchen_id', 'company_id'], 'k_kitchen_has_company_pk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('table_k_kitchen_has_company');
    }
};
