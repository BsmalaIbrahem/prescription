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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->OnDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->OnDelete('cascade');
            $table->double('price');
            $table->enum('status', ['pending', 'paid', 'failed']);
            $table->timestamp('renewal_date');
            $table->bigInteger("subscription_count")->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
