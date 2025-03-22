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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('area_region')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('picture')->nullable();
            $table->string('type_classification')->nullable();
            $table->string('coordinates')->nullable();
            $table->json('documents')->nullable();
            $table->string('profile_image')->default('avatar.png')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'address_1', 
                'address_2', 
                'area_region', 
                'state', 
                'country', 
                'contact_person', 
                'phone', 
                'website', 
                'picture', 
                'type_classification', 
                'coordinates', 
                'documents'
            ]);
        });
    }
};
