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
                Schema::hasColumn('employees_specific', 'university_location_1') &&
                Schema::hasColumn('employees_specific', 'university_location_2') &&
                Schema::hasColumn('employees_specific', 'university_location_3') &&
                Schema::hasColumn('employees_specific', 'num_of_years_1') &&
                Schema::hasColumn('employees_specific', 'num_of_years_2') &&
                Schema::hasColumn('employees_specific', 'num_of_years_3') &&
                Schema::hasColumn('employees_specific', 'gpa_1') &&
                Schema::hasColumn('employees_specific', 'gpa_2') &&
                Schema::hasColumn('employees_specific', 'gpa_3')
            ) {
                $table->dropColumn([
                    'university_location_1',
                    'university_location_2',
                    'university_location_3',
                    'num_of_years_1',
                    'num_of_years_2',
                    'num_of_years_3',
                    'gpa_1',
                    'gpa_2',
                    'gpa_3',
                ]);
            }
            $table->string('scientific_specialization_1', 50)->after('academic_qualification_1');
            $table->string('scientific_specialization_2', 50)->after('academic_qualification_2');
            $table->string('scientific_specialization_3', 50)->after('academic_qualification_3');
        });
        Schema::table('delete_specific', function (Blueprint $table) {
            if (
                Schema::hasColumn('delete_specific', 'university_location_1') &&
                Schema::hasColumn('delete_specific', 'university_location_2') &&
                Schema::hasColumn('delete_specific', 'university_location_3') &&
                Schema::hasColumn('delete_specific', 'num_of_years_1') &&
                Schema::hasColumn('delete_specific', 'num_of_years_2') &&
                Schema::hasColumn('delete_specific', 'num_of_years_3') &&
                Schema::hasColumn('delete_specific', 'gpa_1') &&
                Schema::hasColumn('delete_specific', 'gpa_2') &&
                Schema::hasColumn('delete_specific', 'gpa_3')
            ) {
                $table->dropColumn([
                    'university_location_1',
                    'university_location_2',
                    'university_location_3',
                    'num_of_years_1',
                    'num_of_years_2',
                    'num_of_years_3',
                    'gpa_1',
                    'gpa_2',
                    'gpa_3',
                ]);
            }
            $table->string('scientific_specialization_1', 50)->after('academic_qualification_1');
            $table->string('scientific_specialization_2', 50)->after('academic_qualification_2');
            $table->string('scientific_specialization_3', 50)->after('academic_qualification_3');
        });
        Schema::table('employees_postpone', function (Blueprint $table) {
            if (
                Schema::hasColumn('employees_postpone', 'university_location_1') &&
                Schema::hasColumn('employees_postpone', 'university_location_2') &&
                Schema::hasColumn('employees_postpone', 'university_location_3') &&
                Schema::hasColumn('employees_postpone', 'num_of_years_1') &&
                Schema::hasColumn('employees_postpone', 'num_of_years_2') &&
                Schema::hasColumn('employees_postpone', 'num_of_years_3') &&
                Schema::hasColumn('employees_postpone', 'gpa_1') &&
                Schema::hasColumn('employees_postpone', 'gpa_2') &&
                Schema::hasColumn('employees_postpone', 'gpa_3')
            ) {
                $table->dropColumn([
                    'university_location_1',
                    'university_location_2',
                    'university_location_3',
                    'num_of_years_1',
                    'num_of_years_2',
                    'num_of_years_3',
                    'gpa_1',
                    'gpa_2',
                    'gpa_3',
                ]);
            }
            $table->string('scientific_specialization_1', 50)->after('academic_qualification_1');
            $table->string('scientific_specialization_2', 50)->after('academic_qualification_2');
            $table->string('scientific_specialization_3', 50)->after('academic_qualification_3');
        });
        Schema::table('delete_postpone', function (Blueprint $table) {
            if (
                Schema::hasColumn('delete_postpone', 'university_location_1') &&
                Schema::hasColumn('delete_postpone', 'university_location_2') &&
                Schema::hasColumn('delete_postpone', 'university_location_3') &&
                Schema::hasColumn('delete_postpone', 'num_of_years_1') &&
                Schema::hasColumn('delete_postpone', 'num_of_years_2') &&
                Schema::hasColumn('delete_postpone', 'num_of_years_3') &&
                Schema::hasColumn('delete_postpone', 'gpa_1') &&
                Schema::hasColumn('delete_postpone', 'gpa_2') &&
                Schema::hasColumn('delete_postpone', 'gpa_3')
            ) {
                $table->dropColumn([
                    'university_location_1',
                    'university_location_2',
                    'university_location_3',
                    'num_of_years_1',
                    'num_of_years_2',
                    'num_of_years_3',
                    'gpa_1',
                    'gpa_2',
                    'gpa_3',
                ]);
            }
            $table->string('scientific_specialization_1', 50)->after('academic_qualification_1');
            $table->string('scientific_specialization_2', 50)->after('academic_qualification_2');
            $table->string('scientific_specialization_3', 50)->after('academic_qualification_3');
        });
        Schema::table('employees_appointed', function (Blueprint $table) {
            if (
                Schema::hasColumn('employees_appointed', 'university_location_1') &&
                Schema::hasColumn('employees_appointed', 'university_location_2') &&
                Schema::hasColumn('employees_appointed', 'university_location_3') &&
                Schema::hasColumn('employees_appointed', 'num_of_years_1') &&
                Schema::hasColumn('employees_appointed', 'num_of_years_2') &&
                Schema::hasColumn('employees_appointed', 'num_of_years_3') &&
                Schema::hasColumn('employees_appointed', 'gpa_1') &&
                Schema::hasColumn('employees_appointed', 'gpa_2') &&
                Schema::hasColumn('employees_appointed', 'gpa_3')
            ) {
                $table->dropColumn([
                    'university_location_1',
                    'university_location_2',
                    'university_location_3',
                    'num_of_years_1',
                    'num_of_years_2',
                    'num_of_years_3',
                    'gpa_1',
                    'gpa_2',
                    'gpa_3',
                ]);
            }
            $table->string('scientific_specialization_1', 50)->after('academic_qualification_1');
            $table->string('scientific_specialization_2', 50)->after('academic_qualification_2');
            $table->string('scientific_specialization_3', 50)->after('academic_qualification_3');
        });
        Schema::table('delete_appointed', function (Blueprint $table) {
            if (
                Schema::hasColumn('delete_appointed', 'university_location_1') &&
                Schema::hasColumn('delete_appointed', 'university_location_2') &&
                Schema::hasColumn('delete_appointed', 'university_location_3') &&
                Schema::hasColumn('delete_appointed', 'num_of_years_1') &&
                Schema::hasColumn('delete_appointed', 'num_of_years_2') &&
                Schema::hasColumn('delete_appointed', 'num_of_years_3') &&
                Schema::hasColumn('delete_appointed', 'gpa_1') &&
                Schema::hasColumn('delete_appointed', 'gpa_2') &&
                Schema::hasColumn('delete_appointed', 'gpa_3')
            ) {
                $table->dropColumn([
                    'university_location_1',
                    'university_location_2',
                    'university_location_3',
                    'num_of_years_1',
                    'num_of_years_2',
                    'num_of_years_3',
                    'gpa_1',
                    'gpa_2',
                    'gpa_3',
                ]);
            }
            $table->string('scientific_specialization_1', 50)->after('academic_qualification_1');
            $table->string('scientific_specialization_2', 50)->after('academic_qualification_2');
            $table->string('scientific_specialization_3', 50)->after('academic_qualification_3');
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
