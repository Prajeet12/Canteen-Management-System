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
        Schema::create('qr_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->string('qrimage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_images');
    }
};
