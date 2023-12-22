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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->string("order_no");
            $table->double("total_amt")->default(0);
            $table->double("vat_amount")->default(0); // New field for VAT amount
            $table->double("grand_total")->default(0); // New field for grand total
            $table->unsignedBigInteger('method_id')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->timestamp('invoice_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
