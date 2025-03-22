<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('professions', function (Blueprint $table) {
            $table->id(); // Primary key, automatically uses 'id'
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade'); // Foreign key to sub_categories table
            $table->string('location'); // Location field
            $table->string('name'); // Name field
            $table->text('description'); // Description field
            $table->text('short_description'); // Short description field
            $table->string('title'); // Title field
            $table->string('experience'); // Experience field
            $table->string('thumbnail'); // Thumbnail field (url or path)
            $table->boolean('featured')->default(false); // Featured flag (true/false)
            $table->string('slug')->unique(); // Slug field for SEO purposes
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialists');
    }
};
