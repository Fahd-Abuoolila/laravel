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
            if (
                Schema::hasColumn('employees_specific', 'academic_qualification_3') &&
                Schema::hasColumn('employees_specific', 'scientific_specialization_3') &&
                Schema::hasColumn('employees_specific', 'university_3') &&
                Schema::hasColumn('employees_specific', 'year_graduated_3')
            ) {
                $table->dropColumn([
                    'academic_qualification_3',
                    'scientific_specialization_3',
                    'university_3',
                    'year_graduated_3',
                ]);
            }
        });
        Schema::table('delete_specific', function (Blueprint $table) {
            if (
                Schema::hasColumn('delete_specific', 'academic_qualification_3') &&
                Schema::hasColumn('delete_specific', 'scientific_specialization_3') &&
                Schema::hasColumn('delete_specific', 'university_3') &&
                Schema::hasColumn('delete_specific', 'year_graduated_3')
            ) {
                $table->dropColumn([
                    'academic_qualification_3',
                    'scientific_specialization_3',
                    'university_3',
                    'year_graduated_3',
                ]);
            }
        });
        Schema::table('employees_postpone', function (Blueprint $table) {
            if (
                Schema::hasColumn('employees_postpone', 'academic_qualification_3') &&
                Schema::hasColumn('employees_postpone', 'scientific_specialization_3') &&
                Schema::hasColumn('employees_postpone', 'university_3') &&
                Schema::hasColumn('employees_postpone', 'year_graduated_3')
            ) {
                $table->dropColumn([
                    'academic_qualification_3',
                    'scientific_specialization_3',
                    'university_3',
                    'year_graduated_3',
                ]);
            }
        });
        Schema::table('delete_postpone', function (Blueprint $table) {
            if (
                Schema::hasColumn('delete_postpone', 'academic_qualification_3') &&
                Schema::hasColumn('delete_postpone', 'scientific_specialization_3') &&
                Schema::hasColumn('delete_postpone', 'university_3') &&
                Schema::hasColumn('delete_postpone', 'year_graduated_3')
            ) {
                $table->dropColumn([
                    'academic_qualification_3',
                    'scientific_specialization_3',
                    'university_3',
                    'year_graduated_3',
                ]);
            }
        });
        Schema::table('employees_appointed', function (Blueprint $table) {
            if (
                Schema::hasColumn('employees_appointed', 'academic_qualification_3') &&
                Schema::hasColumn('employees_appointed', 'scientific_specialization_3') &&
                Schema::hasColumn('employees_appointed', 'university_3') &&
                Schema::hasColumn('employees_appointed', 'year_graduated_3')
            ) {
                $table->dropColumn([
                    'academic_qualification_3',
                    'scientific_specialization_3',
                    'university_3',
                    'year_graduated_3',
                ]);
            }
        });
        Schema::table('delete_appointed', function (Blueprint $table) {
            if (
                Schema::hasColumn('delete_appointed', 'academic_qualification_3') &&
                Schema::hasColumn('delete_appointed', 'scientific_specialization_3') &&
                Schema::hasColumn('delete_appointed', 'university_3') &&
                Schema::hasColumn('delete_appointed', 'year_graduated_3')
            ) {
                $table->dropColumn([
                    'academic_qualification_3',
                    'scientific_specialization_3',
                    'university_3',
                    'year_graduated_3',
                ]);
            }
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
