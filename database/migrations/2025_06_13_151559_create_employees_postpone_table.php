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
        Schema::create('employees_postpone', function (Blueprint $table) {
                        $table->id('emolyee_id');
            $table->timestamp('date_Of_date')->nullable();
            $table->string('first_name',100);
            $table->string('second_name',100);
            $table->string('third_name',100);
            $table->string('last_name',100);
            $table->string('national_id',50);
            $table->date('date_of_issue');
            $table->string('place_of_issue',100);
            $table->string('nationality',50);
            $table->string('place_of_birth',100);
            $table->string('date_of_birth',100);
            $table->string('insurance_num',100);
            $table->string('conscription',100);
            $table->string('marital_status',50);
            $table->integer('Num_of_children');
            $table->string('job_required',100);
            $table->string('frontOFcard_up',100);
            $table->string('backOFcard_up',100);
            $table->string('photoOFuser_up',100);
            $table->string('number_tel_1',20);
            $table->string('number_tel_2',20);
            $table->longText('place_of_residence');
            $table->string('governorate',100);
            $table->string('centre',100);
            $table->string('area_code',20);
            $table->string('employ_email',100);
            $table->longText('academic_qualification_1');
            $table->string('university_1',100);
            $table->string('university_locition_1',100);
            $table->string('num_of_years_1',225);
            $table->string('gpa_1',10);
            $table->string('year_graduated_1',10);
            $table->longText('academic_qualification_2');
            $table->string('university_2',100);
            $table->string('university_locition_2',100);
            $table->string('num_of_years_2',225);
            $table->string('gpa_2',10);
            $table->string('year_graduated_2',10);
            $table->longText('academic_qualification_3');
            $table->string('university_3',100);
            $table->string('university_locition_3',100);
            $table->string('num_of_years_3',225);
            $table->string('gpa_3',10);
            $table->string('year_graduated_3',10);
            $table->string('course_name_1',100);
            $table->string('duration_1',50);
            $table->string('sponsor_1',100);
            $table->date('course_date_1');
            $table->string('course_location_1',100);
            $table->string('course_name_2',10);
            $table->string('duration_2',50);
            $table->string('sponsor_2',100);
            $table->date('course_date_2');
            $table->string('course_location_2',100);
            $table->string('course_name_3',100);
            $table->string('duration_3',50);
            $table->string('sponsor_3',100);
            $table->date('course_date_3');
            $table->string('course_location_3',100);
            $table->string('course_name_4',100);
            $table->string('duration_4',50);
            $table->string('sponsor_4',100);
            $table->date('course_date_4');
            $table->string('course_location_4',100);
            $table->string('course_name_5',100);
            $table->string('duration_5',50);
            $table->string('sponsor_5',100);
            $table->date('course_date_5');
            $table->string('course_location_5',100);
            $table->string('employer_name_1',100);
            $table->string('positica_1',100);
            $table->date('date_from_1');
            $table->date('date_to_1');
            $table->decimal('basic_salary_1',total: 10, places: 3);
            $table->longText('reason_for_leaving_1');
            $table->string('employer_name_2',100);
            $table->string('positica_2',100);
            $table->date('date_from_2');
            $table->date('date_to_2');
            $table->decimal('basic_salary_2',total: 10, places: 3);
            $table->longText('reason_for_leaving_2');
            $table->string('employer_name_3',100);
            $table->string('positica_3',100);
            $table->date('date_from_3');
            $table->date('date_to_3');
            $table->decimal('basic_salary_3',total: 10, places: 3);
            $table->longText('reason_for_leaving_3');
            $table->string('employer_name_4',100);
            $table->string('positica_4',100);
            $table->date('date_from_4');
            $table->date('date_to_4');
            $table->decimal('basic_salary_4',total: 10, places: 3);
            $table->longText('reason_for_leaving_4');
            $table->decimal('last_sallary',total: 10, places: 3);
            $table->string('skills_1',100);
            $table->string('skills_2',100);
            $table->string('skills_3',100);
            $table->string('skills_4',100);
            $table->string('arabic_reading',25);
            $table->string('arabic_writing',25);
            $table->string('arabic_speaking',25);
            $table->string('english_reading',25);
            $table->string('english_writing',25);
            $table->string('english_speaking',25);
            $table->string('hobbies_1',100);
            $table->string('hobbies_2',100);
            $table->string('person_name_1',100);
            $table->string('person_relationship_1',100);
            $table->string('person_phone_1',20);
            $table->text('person_address_1');
            $table->string('person_name_2',100);
            $table->string('person_relationship_2',100);
            $table->string('person_phone_2',25);
            $table->text('person_address_2');
            $table->text('reason')->nullsble();
            $table->text('reason_notes')->nullsble();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_postpone');
    }
};
