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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('loan_id');
            $table->decimal('amount_paid', 15, 2);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users'); // Replace 'users' with your actual user table name
            $table->foreign('loan_id')->references('id')->on('loans'); // Replace 'loans' with your actual loan table name
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
