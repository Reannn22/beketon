<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->integer('amount')->default(1);
            $table->text('description')->nullable();
            $table->dateTime('borrow_date');
            $table->dateTime('return_date')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'returned'])->default('pending');
            $table->string('return_photo')->nullable();
            $table->text('return_description')->nullable();
            $table->decimal('penalty_amount', 10, 2)->default(0);
            $table->boolean('penalty_paid')->default(false);
            $table->string('penalty_proof')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
