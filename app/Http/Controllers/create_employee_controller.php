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
            $frontCard = $request->file('frontOFcard')->storeAs(
                'uploads',
                'front_of_card_' . time() . '_' . $request->input('first_name') . '_' . $request->input('second_name') . '_' . $request->input('third_name') . '_' . $request->input('last_name') . "." . $request->file('frontOFcard')->getClientOriginalExtension(),
                'public'
            );
        }
        if ($request->hasFile('backOFcard')) {
            $backCard = $request->file('backOFcard')->storeAs(
                'uploads',
                'back_of_card_' . time() . '_' . $request->input('first_name') . '_' . $request->input('second_name') . '_' . $request->input('third_name') . '_' . $request->input('last_name') . "." . $request->file('frontOFcard')->getClientOriginalExtension(),
                'public'
            );
        }
        if ($request->hasFile('photoOFuser')) {
            $userPhoto = $request->file('photoOFuser')->storeAs(
                'uploads',
                'photo_of_user_' . time() . '_' . $request->input('first_name') . '_' . $request->input('second_name') . '_' . $request->input('third_name') . '_' . $request->input('last_name') . "." . $request->file('frontOFcard')->getClientOriginalExtension(),
                'public'
            );
        }
        if (!empty(trim($request->input('insurance_num')))) {
            $insurance_num = trim($request->input('insurance_num'));
        }else{
            $insurance_num = 0 ;
        }
        if (!empty(trim($request->input('number_of_children')))) {
            $Num_of_children = trim($request->input('number_of_children'));
        }else{
            $Num_of_children = 0 ;
        }
        if (!empty(trim($request->input('numberOFphone_2')))) {
            $numberOFphone_2 = trim($request->input('numberOFphone_2'));
        }else{
            $numberOFphone_2 = '-' ;
        }
        if (!empty(trim($request->input('academic_qualification_2')))) {
            $academic_qualification_2 = trim($request->input('academic_qualification_2'));
            $scientific_specialization_2 = trim($request->input('scientific_specialization_2'));
            $university_2 = trim($request->input('university_2'));
            $year_graduated_2 = trim($request->input('year_graduated_2'));
        }else{
            $academic_qualification_2 = '-' ;
            $scientific_specialization_2 = '-' ;
            $university_2 = '-' ;
            $year_graduated_2 = '-' ;
        }
        if (!empty(trim($request->input('course_name_1')))) {
            $course_name_1 = trim($request->input('course_name_1'));
            $duration_1 = trim($request->input('duration_1'));
            $sponsor_1 = trim($request->input('sponsor_1'));
            $date_1 = trim($request->input('date_1'));
            $location_1 = trim($request->input('location_1'));
        }else{
            $course_name_1 = '-' ;
            $duration_1 = '-' ;
            $sponsor_1 = '-' ;
            $date_1 = '-' ;
            $location_1 = '-' ;
        }
        if (!empty(trim($request->input('course_name_2')))) {
            $course_name_2 = trim($request->input('course_name_2'));
            $duration_2 = trim($request->input('duration_2'));
            $sponsor_2 = trim($request->input('sponsor_2'));
            $date_2 = trim($request->input('date_2'));
            $location_2 = trim($request->input('location_2'));
        }else{
            $course_name_2 = '-' ;
            $duration_2 = '-' ;
            $sponsor_2 = '-' ;
            $date_2 = '-' ;
            $location_2 = '-' ;
        }
        if (!empty(trim($request->input('course_name_3')))) {
            $course_name_3 = trim($request->input('course_name_3'));
            $duration_3 = trim($request->input('duration_3'));
            $sponsor_3 = trim($request->input('sponsor_3'));
            $date_3 = trim($request->input('date_3'));
            $location_3 = trim($request->input('location_3'));
        }else{
            $course_name_3 = '-' ;
            $duration_3 = '-' ;
            $sponsor_3 = '-' ;
            $date_3 = '-' ;
            $location_3 = '-' ;
        }
        if (!empty(trim($request->input('course_name_4')))) {
            $course_name_4 = trim($request->input('course_name_4'));
            $duration_4 = trim($request->input('duration_4'));
            $sponsor_4 = trim($request->input('sponsor_4'));
            $date_4 = trim($request->input('date_4'));
            $location_4 = trim($request->input('location_4'));
        }else{
            $course_name_4 = '-' ;
            $duration_4 = '-' ;
            $sponsor_4 = '-' ;
            $date_4 = '-' ;
            $location_4 = '-' ;
        }
        if (!empty(trim($request->input('course_name_5')))) {
            $course_name_5 = trim($request->input('course_name_5'));
            $duration_5 = trim($request->input('duration_5'));
            $sponsor_5 = trim($request->input('sponsor_5'));
            $date_5 = trim($request->input('date_5'));
            $location_5 = trim($request->input('location_5'));
        }else{
            $course_name_5 = '-' ;
            $duration_5 = '-' ;
            $sponsor_5 = '-' ;
            $date_5 = '-' ;
            $location_5 = '-' ;
        }

        if (!empty(trim($request->input('employer_name_1')))) {
            $employer_name_1 = trim($request->input('employer_name_1'));
            $positica_1 = trim($request->input('positica_1'));
            $date_from_1 = trim($request->input('date_from_1'));
            $date_to_1 = trim($request->input('date_to_1'));
            $basic_salary_1 = trim($request->input('basic_salary_1'));
            $reasons_for_leaving_1 = trim($request->input('reasons_for_leaving_1'));
        }else{
            $employer_name_1 = '-';
            $positica_1 = '-';
            $date_from_1 = '-';
            $date_to_1 = '-';
            $basic_salary_1 = '-';
            $reasons_for_leaving_1 = '-';
        }
        if (!empty(trim($request->input('employer_name_2')))) {
            $employer_name_2 = trim($request->input('employer_name_2'));
            $positica_2 = trim($request->input('positica_2'));
            $date_from_2 = trim($request->input('date_from_2'));
            $date_to_2 = trim($request->input('date_to_2'));
            $basic_salary_2 = trim($request->input('basic_salary_2'));
            $reasons_for_leaving_2 = trim($request->input('reasons_for_leaving_2'));
        }else{
            $employer_name_2 = '-';
            $positica_2 = '-';
            $date_from_2 = '-';
            $date_to_2 = '-';
            $basic_salary_2 = '-';
            $reasons_for_leaving_2 = '-';
        }
        if (!empty(trim($request->input('employer_name_3')))) {
            $employer_name_3 = trim($request->input('employer_name_3'));
            $positica_3 = trim($request->input('positica_3'));
            $date_from_3 = trim($request->input('date_from_3'));
            $date_to_3 = trim($request->input('date_to_3'));
            $basic_salary_3 = trim($request->input('basic_salary_3'));
            $reasons_for_leaving_3 = trim($request->input('reasons_for_leaving_3'));
        }else{
            $employer_name_3 = '-';
            $positica_3 = '-';
            $date_from_3 = '-';
            $date_to_3 = '-';
            $basic_salary_3 = '-';
            $reasons_for_leaving_3 = '-';
        }
        if (!empty(trim($request->input('employer_name_4')))) {
            $employer_name_4 = trim($request->input('employer_name_4'));
            $positica_4 = trim($request->input('positica_4'));
            $date_from_4 = trim($request->input('date_from_4'));
            $date_to_4 = trim($request->input('date_to_4'));
            $basic_salary_4 = trim($request->input('basic_salary_4'));
            $reasons_for_leaving_4 = trim($request->input('reasons_for_leaving_4'));
        }else{
            $employer_name_4 = '-';
            $positica_4 = '-';
            $date_from_4 = '-';
            $date_to_4 = '-';
            $basic_salary_4 = '-';
            $reasons_for_leaving_4 = '-';
        }
        if (!empty(trim($request->input('last_sallary')))) {
            $last_sallary = trim($request->input('last_sallary'));
        }else{
            $last_sallary = '-';
        }

        if (!empty(trim($request->input('skills_1')))) {
            $skills_1 = trim($request->input('skills_1'));
        }else{
            $skills_1 = '-';
        }
        if (!empty(trim($request->input('skills_2')))) {
            $skills_2 = trim($request->input('skills_2'));
        }else{
            $skills_2 = '-';
        }
        if (!empty(trim($request->input('skills_3')))) {
            $skills_3 = trim($request->input('skills_3'));
        }else{
            $skills_3 = '-';
        }
        if (!empty(trim($request->input('skills_4')))) {
            $skills_4 = trim($request->input('skills_4'));
        }else{
            $skills_4 = '-';
        }

        if (!empty(trim($request->input('hobbies_1')))) {
            $hobbies_1 = trim($request->input('hobbies_1'));
        }else{
            $hobbies_1 = '-';
        }
        if (!empty(trim($request->input('hobbies_2')))) {
            $hobbies_2 = trim($request->input('hobbies_2'));
        }else{
            $hobbies_2 = '-';
        }
        if (!empty(trim($request->input('person_name_2')))) {
            $person_name_2 = trim($request->input('person_name_2'));
            $person_relationship_2 = trim($request->input('person_relationship_2'));
            $person_phone_2 = trim($request->input('person_phone_2'));
            $person_address_2 = trim($request->input('person_address_2'));
        }else{
            $person_name_2 = '-';
            $person_relationship_2 = '-';
            $person_phone_2 = '-';
            $person_address_2 = '-';
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
            'insurance_num' => $insurance_num,
            'conscription' => $request->input('conscription'),
            'marital_status' => $request->input('marital_status'),
            'Num_of_children' => $Num_of_children,
            'job_required' => $request->input('job_required'),
            'frontOFcard_up' => $frontCard,
            'backOFcard_up' => $backCard,
            'photoOFuser_up' => $userPhoto,
            'number_tel_1' => $request->input('numberOFphone_1'),
            'number_tel_2' => $numberOFphone_2,
            'place_of_residence' => $request->input('address'),
            'governorate' => $request->input('governorateSelect'),
            'centre' => $request->input('centerSelect'),
            'employ_email' => $request->input('useremail'),
            'academic_qualification_1' => $request->input('academic_qualification_1'),
            'scientific_specialization_1' => $request->input('scientific_specialization_1'),
            'university_1' => $request->input('university_1'),
            'year_graduated_1' => $request->input('year_graduated_1'),
            'academic_qualification_2' => $academic_qualification_2,
            'scientific_specialization_2' => $scientific_specialization_2,
            'university_2' => $university_2,
            'year_graduated_2' => $year_graduated_2,
            'course_name_1' => $course_name_1,
            'duration_1' => $duration_1,
            'sponsor_1' => $sponsor_1,
            'course_date_1' => $date_1,
            'course_location_1' => $location_1,
            'course_name_2' => $course_name_2,
            'duration_2' => $duration_2,
            'sponsor_2' => $sponsor_2,
            'course_date_2' => $date_2,
            'course_location_2' => $location_2,
            'course_name_3' => $course_name_3,
            'duration_3' => $duration_3,
            'sponsor_3' => $sponsor_3,
            'course_date_3' => $date_3,
            'course_location_3' => $location_3,
            'course_name_4' => $course_name_4,
            'duration_4' => $duration_4,
            'sponsor_4' => $sponsor_4,
            'course_date_4' => $date_4,
            'course_location_4' => $location_4,
            'course_name_5' => $course_name_5,
            'duration_5' => $duration_5,
            'sponsor_5' => $sponsor_5,
            'course_date_5' => $date_5,
            'course_location_5' => $location_5,
            'employer_name_1' => $employer_name_1,
            'positica_1' => $positica_1,
            'date_from_1' => $date_from_1,
            'date_to_1' => $date_to_1,
            'basic_salary_1' => $basic_salary_1,
            'reason_for_leaving_1' => $reasons_for_leaving_1,
            'employer_name_2' => $employer_name_2,
            'positica_2' => $positica_2,
            'date_from_2' => $date_from_2,
            'date_to_2' => $date_to_2,
            'basic_salary_2' => $basic_salary_2,
            'reason_for_leaving_2' => $reasons_for_leaving_2,
            'employer_name_3' => $employer_name_3,
            'positica_3' => $positica_3,
            'date_from_3' => $date_from_3,
            'date_to_3' => $date_to_3,
            'basic_salary_3' => $basic_salary_3,
            'reason_for_leaving_3' => $reasons_for_leaving_3,
            'employer_name_4' => $employer_name_4,
            'positica_4' => $positica_4,
            'date_from_4' => $date_from_4,
            'date_to_4' => $date_to_4,
            'basic_salary_4' => $basic_salary_4,
            'reason_for_leaving_4' => $reasons_for_leaving_4,
            'last_sallary' => $last_sallary,
            'skills_1' => $skills_1,
            'skills_2' => $skills_2,
            'skills_3' => $skills_3,
            'skills_4' => $skills_4,
            'arabic_reading' => $request->input('arabic_reading'),
            'arabic_writing' => $request->input('arabic_writing'),
            'arabic_speaking' => $request->input('arabic_speaking'),
            'english_reading' => $request->input('english_reading'),
            'english_writing' => $request->input('english_writing'),
            'english_speaking' => $request->input('english_speaking'),
            'hobbies_1' => $hobbies_1,
            'hobbies_2' => $hobbies_2,
            'person_name_1' => $request->input('person_name_1'),
            'person_relationship_1' => $request->input('person_relationship_1'),
            'person_phone_1' => $request->input('person_phone_1'),
            'person_address_1' => $request->input('person_address_1'),
            'person_name_2' => $person_name_2,
            'person_relationship_2' => $person_relationship_2,
            'person_phone_2' => $person_phone_2,
            'person_address_2' => $person_address_2,
            'reason' => '',
            'reason_notes' => '',
        ];

        Create_employee_model::create($insert);
        return redirect()->route('create');
    }
};
