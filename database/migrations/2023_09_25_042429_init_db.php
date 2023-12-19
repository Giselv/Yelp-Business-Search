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
        //
        Schema::create('business', function(Blueprint $table) {
            $table->string('business_id',1024);
            $table->string('name',1024);
            $table->string('address',1024);
            $table->string('city',1024);
            $table->string('state',1024);
            $table->string('postal_code',1024);
            $table->decimal('stars');
            $table->integer('review_count');
            $table->integer('is_open');
            $table->string('categories',1024);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
