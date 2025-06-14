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
        Schema::table('employees_specific', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_issue',
                'place_of_issue',
                'area_code',
            ]);
        });
        Schema::table('delete_specific', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_issue',
                'place_of_issue',
                'area_code',
            ]);
        });
        Schema::table('employees_postpone', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_issue',
                'place_of_issue',
                'area_code',
            ]);
        });
        Schema::table('delete_postpone', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_issue',
                'place_of_issue',
                'area_code',
            ]);
        });
        Schema::table('employees_appointed', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_issue',
                'place_of_issue',
                'area_code',
            ]);
        });
        Schema::table('delete_appointed', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_issue',
                'place_of_issue',
                'area_code',
            ]);
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
