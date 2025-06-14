<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Create_employee_model;


class create_employee_controller extends Controller
{
    public function create()
    {
        return view('create_new_employee');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('frontOFcard')) {
            $frontCard = $request->file('frontOFcard')->store('uploads', 'public');
        }

        if ($request->hasFile('backOFcard')) {
            $backCard = $request->file('backOFcard')->store('uploads', 'public');
        }

        if ($request->hasFile('photoOFuser')) {
            $userPhoto = $request->file('photoOFuser')->store('uploads', 'public');
        }

        $insert = [
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'third_name' => $request->input('third_name'),
            'last_name' => $request->input('last_name'),
            'national_id' => $request->input('national_id'),
            'nationality' => $request->input('nationality'),
            'place_of_birth' => $request->input('place_of_birth'),
            'date_of_birth' => $request->input('date_of_birth'),
            'insurance_num' => $request->input('insurance_num'),
            'conscription' => $request->input('conscription'),
            'marital_status' => $request->input('marital_status'),
            'Num_of_children' => $request->input('number_of_children'),
            'job_required' => $request->input('job_required'),
            'frontOFcard_up' => $frontCard,
            'backOFcard_up' => $backCard,
            'photoOFuser_up' => $userPhoto,
            'number_tel_1' => $request->input('numberOFphone_1'),
            'number_tel_2' => $request->input('numberOFphone_2'),
            'place_of_residence' => $request->input('address'),
            'governorate' => $request->input('governorateSelect'),
            'centre' => $request->input('centerSelect'),
            'employ_email' => $request->input('useremail'),
            'academic_qualification_1' => $request->input('academic_qualification_1'),
            'university_1' => $request->input('university_1'),
            'university_location_1' => $request->input('university_location_1'),
            'num_of_years_1' => $request->input('num_of_year_1'),
            'gpa_1' => $request->input('gpa_1'),
            'year_graduated_1' => $request->input('year_graduated_1'),
            'academic_qualification_2' => $request->input('academic_qualification_2'),
            'university_2' => $request->input('university_2'),
            'university_location_2' => $request->input('university_location_2'),
            'num_of_years_2' => $request->input('num_of_year_2'),
            'gpa_2' => $request->input('gpa_2'),
            'year_graduated_2' => $request->input('year_graduated_2'),
            'academic_qualification_3' => $request->input('academic_qualification_3'),
            'university_3' => $request->input('university_3'),
            'university_location_3' => $request->input('university_location_3'),
            'num_of_years_3' => $request->input('num_of_year_3'),
            'gpa_3' => $request->input('gpa_3'),
            'year_graduated_3' => $request->input('year_graduated_3'),
            'course_name_1' => $request->input('course_name_1'),
            'duration_1' => $request->input('duration_1'),
            'sponsor_1' => $request->input('sponsor_1'),
            'course_date_1' => $request->input('date_1'),
            'course_location_1' => $request->input('location_1'),
            'course_name_2' => $request->input('course_name_2'),
            'duration_2' => $request->input('duration_2'),
            'sponsor_2' => $request->input('sponsor_2'),
            'course_date_2' => $request->input('date_2'),
            'course_location_2' => $request->input('location_2'),
            'course_name_3' => $request->input('course_name_3'),
            'duration_3' => $request->input('duration_3'),
            'sponsor_3' => $request->input('sponsor_3'),
            'course_date_3' => $request->input('date_3'),
            'course_location_3' => $request->input('location_3'),
            'course_name_4' => $request->input('course_name_4'),
            'duration_4' => $request->input('duration_4'),
            'sponsor_4' => $request->input('sponsor_4'),
            'course_date_4' => $request->input('date_4'),
            'course_location_4' => $request->input('location_4'),
            'course_name_5' => $request->input('course_name_5'),
            'duration_5' => $request->input('duration_5'),
            'sponsor_5' => $request->input('sponsor_5'),
            'course_date_5' => $request->input('date_5'),
            'course_location_5' => $request->input('location_5'),
            'employer_name_1' => $request->input('employer_name_1'),
            'positica_1' => $request->input('positica_1'),
            'date_from_1' => $request->input('date_from_1'),
            'date_to_1' => $request->input('date_to_1'),
            'basic_salary_1' => $request->input('basic_salary_1'),
            'reason_for_leaving_1' => $request->input('reasons_for_leaving_1'),
            'employer_name_2' => $request->input('employer_name_2'),
            'positica_2' => $request->input('positica_2'),
            'date_from_2' => $request->input('date_from_2'),
            'date_to_2' => $request->input('date_to_2'),
            'basic_salary_2' => $request->input('basic_salary_2'),
            'reason_for_leaving_2' => $request->input('reasons_for_leaving_2'),
            'employer_name_3' => $request->input('employer_name_3'),
            'positica_3' => $request->input('positica_3'),
            'date_from_3' => $request->input('date_from_3'),
            'date_to_3' => $request->input('date_to_3'),
            'basic_salary_3' => $request->input('basic_salary_3'),
            'reason_for_leaving_3' => $request->input('reasons_for_leaving_3'),
            'employer_name_4' => $request->input('employer_name_4'),
            'positica_4' => $request->input('positica_4'),
            'date_from_4' => $request->input('date_from_4'),
            'date_to_4' => $request->input('date_to_4'),
            'basic_salary_4' => $request->input('basic_salary_4'),
            'reason_for_leaving_4' => $request->input('reasons_for_leaving_4'),
            'last_sallary' => $request->input('last_sallary'),
            'skills_1' => $request->input('skills_1'),
            'skills_2' => $request->input('skills_2'),
            'skills_3' => $request->input('skills_3'),
            'skills_4' => $request->input('skills_4'),
            'arabic_reading' => $request->input('arabic_reading'),
            'arabic_writing' => $request->input('arabic_writing'),
            'arabic_speaking' => $request->input('arabic_speaking'),
            'english_reading' => $request->input('english_reading'),
            'english_writing' => $request->input('english_writing'),
            'english_speaking' => $request->input('english_speaking'),
            'hobbies_1' => $request->input('hobbies_1'),
            'hobbies_2' => $request->input('hobbies_2'),
            'person_name_1' => $request->input('person_name_1'),
            'person_relationship_1' => $request->input('person_relationship_1'),
            'person_phone_1' => $request->input('person_phone_1'),
            'person_address_1' => $request->input('person_address_1'),
            'person_name_2' => $request->input('person_name_2'),
            'person_relationship_2' => $request->input('person_relationship_2'),
            'person_phone_2' => $request->input('person_phone_2'),
            'person_address_2' => $request->input('person_address_2'),
            'reason' => '',
            'reason_notes' => '',
        ];

        Create_employee_model::create($insert);
        return redirect()->route('create');
    }
};
