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
        Schema::create('pets', function (Blueprint $table) {
            $table->id("pet_id");
            $table->string("name_pet");
            $table->integer("age_pet");
            $table->string("gender");
            $table->string("breed");
            $table->boolean("vaccine");
            $table->boolean("status");
            $table->string("info");
            $table->string("foundation");
            $table->string("province");
            $table->string("type");
            $table->string("picture");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

    }
};
