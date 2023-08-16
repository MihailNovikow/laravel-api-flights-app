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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
   $table->integer('aircraft_id');
   $table->integer('airport_id1');
   $table->integer('airport_id2');
   $table->timestamp('takeoff');
   $table->timestamp('landing');
   $table->integer('cargo_load');
   $table->integer('cargo_offload');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
