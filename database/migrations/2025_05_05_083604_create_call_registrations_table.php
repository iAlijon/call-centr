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
        Schema::create('call_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->integer('theme_id');
            $table->integer('operator_id');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('theme_id')->references('id')->on('call_themes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_registrations');
    }
};
