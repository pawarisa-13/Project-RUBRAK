<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('number_req');
            $table->unique(['user_id','pet_id']); //อันนี้แบบไม่ให้ user ส่งซ้ำกัน
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); //ไว้ดึง id user
            $table->foreignId('pet_id')->references('pet_id')->on('pets')->cascadeOndelete(); //ไว้ดึง id pet
            $table->string('phone',20);
            $table->text("pet_experience");
            $table->string("other_pet");
            $table->text("adopt_reason");
            $table->string("address_user");
            $table->enum('status_request', ['waiting','approved','rejected'])->default('waiting');
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
        
    }
};
