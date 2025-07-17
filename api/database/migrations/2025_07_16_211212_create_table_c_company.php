<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('c_company', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("image");
            $table->string("address");
            $table->string("phone1");
            $table->string("phone2");
            $table->string("email1");
            $table->string("email2");
            $table->string("logo");
            $table->string("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('c_company');
    }
};
