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
        Schema::create('loan_loan_category', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_category_id');
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_category_id')->references('id')->on('loan_categories')->onDelete('cascade');
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
            $table->primary(['loan_category_id','loan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_loan_category');
    }
};
