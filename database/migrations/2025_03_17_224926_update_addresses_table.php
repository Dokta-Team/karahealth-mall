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
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('name')->after('user_id');
            $table->string('phone')->after('name');
            $table->string('apt')->nullable()->after('address');
            $table->string('city')->after('apt');
            $table->string('state')->after('city');
            $table->string('zip_code')->after('state');
            $table->string('country')->after('zip_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn(['name', 'phone', 'address', 'apt', 'city', 'state', 'zip_code', 'country']);
        });
    }
};
