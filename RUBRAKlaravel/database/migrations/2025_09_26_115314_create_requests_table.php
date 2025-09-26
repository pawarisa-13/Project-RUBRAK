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
            $table->id("number_req");
            $table->integer("user_id");
            $table->integer("pet_id");
            $table->string("pet_experience");
            $table->integer("otherpet");
            $table->string("adopt_reason");
            $table->string("address_user");
            $table->boolean("status_request");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
        Schema::table('requests', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
