<!DOCTYPE html>
<html lang='ar'>
    <head>
        <!-- meta -->
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='description' content='this system is private property'>
        <!-- link icon -->
        <link rel='icon' href="{{ asset('img/Roaya_icon.png') }}">
        <!-- link css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/staff_person.css') }}">
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <title>Roaya Pay</title>
        <style>
            .menu > ul > li:nth-child(1):not(.open) > a ,
            .menu > ul > li:nth-child(1) > a + ul > li:nth-child(1) > a{
                background: #5aaa5791 !important;
            }
        </style>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap");

            body {
                direction: rtl;
                font-family: "Cairo", sans-serif;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
        </style>
    </head>
    <body>
        <!-- header -->

        @include('addition.header')

        <!-- content -->
        <div class='content'>
            <!-- menu -->
            @include('addition.menu')
            <!-- show-board -->
            <div class='show-board'>
                {{-- <div class='title-info'>
                        <p>بيانات الموظفين</p>
                        <div class='btns-export-group'>
                            <button class='btn export mx-2' id="export">التصدير الي pdf</button>
                        </div>
                    </div>
                    <form novalidate>
                        <div class='modal-header text-light'>
                        <h5 class='modal-title' id='showpersonTitle'>عرض استمارة الموظف
                            <span style="color: #5aaa57;">
                                @if(@isset($person) && !@empty($person))
                                    {{ $person->first_name }} {{ $person->second_name }} {{ $person->third_name }} {{ $person->last_name }}
                                @endif
                            </span>
                        </h5>
                        </div>
                    </form>
                    <div class='person-info'>
                        <div class='container' id="employee_specific" name='employee_specific'>
                            <div>
                                <p class='title text-dark'>
                                    شركة رؤية باي لحلول السداد و البرمجيات
                                </p>
                                <img src="{{ asset('img/Roaya_icon.png') }}" alt="" draggable='false'>
                            </div>
                            <span>
                                الإستمارة الإلكترونية للموظف
                            </span>
                            @if(@isset($person) && !@empty($person))
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            خاص بالموظف
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            الأســم
                                        </td>
                                        <td>
                                            {{ $person->first_name }} {{ $person->second_name }} {{ $person->third_name }} {{ $person->last_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الرقم القومي
                                        </td>
                                        <td>
                                            {{ $person->national_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            تاريخ الإصدار
                                        </td>
                                        <td>
                                            {{$person->date_of_issue}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            مكان الإصدار
                                        </td>
                                        <td>
                                            {{$person->place_of_issue}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الجنسية
                                        </td>
                                        <td>
                                            {{$person->nationality}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            مكان الميلاد
                                        </td>
                                        <td>
                                            {{$person->place_of_birth}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            تاريخ الميلاد
                                        </td>
                                        <td>
                                            {{$person->date_of_birth}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الرقم التأميني
                                        </td>
                                        <td>
                                            {{$person->insurance_num}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الموقف من التجنيد
                                        </td>
                                        <td>
                                            {{$person->conscription}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الحالة الإجتماعية
                                        </td>
                                        <td>
                                            {{$person->marital_status}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            عدد الابناء
                                        </td>
                                        <td>
                                            {{$person->Num_of_children}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الوظيفة المطلوبة
                                        </td>
                                        <td>
                                            {{$person->job_required}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            صورة البطاقة
                                        </td>
                                        <td class='d-flex'>
                                            <img class='w-50' src='../uploads/{{$person->frontOFcard_up}}'>
                                            <img class='w-50' src='../uploads/{{$person->backOFcard_up}}'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            صورة شخصية
                                        </td>
                                        <td class='d-flex justify-content-center'>
                                            <img class='' src='../uploads/{{$person->photoOFuser_up}}'>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            المعلومات الإضافية
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            رقم الهاتف 1
                                        </td>
                                        <td>
                                            {{$person->number_tel_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            رقم الهاتف 2
                                        </td>
                                        <td>
                                            {{$person->number_tel_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            محل السكن
                                        </td>
                                        <td>
                                            {{$person->place_of_residence}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            المحافظة
                                        </td>
                                        <td>
                                            {{$person->governorate}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مركز / حي
                                        </td>
                                        <td>
                                            {{$person->centre}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الرمز البريدي
                                        </td>
                                        <td>
                                            {{$person->area_code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            البريد الإلكتروني
                                        </td>
                                        <td>
                                            {{$person->employ_email}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            المؤهلات العلمية 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            المؤهل العلمي 1
                                        </td>
                                        <td>
                                            {{$person->academic_qualification_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجامعة 1
                                        </td>
                                        <td>
                                            {{$person->university_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 1
                                        </td>
                                        <td>
                                            {{$person->university_locition_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مده الدراسة 1
                                        </td>
                                        <td>
                                            {{$person->num_of_years_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            المعدل التراكمي 1
                                        </td>
                                        <td>
                                            {{$person->gpa_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سنه التخرج 1
                                        </td>
                                        <td>
                                            {{$person->year_graduated_1}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            المؤهلات العلمية 2
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            المؤهل العلمي 2
                                        </td>
                                        <td>
                                            {{$person->academic_qualification_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجامعة 2
                                        </td>
                                        <td>
                                            {{$person->university_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 2
                                        </td>
                                        <td>
                                            {{$person->university_locition_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مده الدراسة 2
                                        </td>
                                        <td>
                                            {{$person->num_of_years_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            المعدل التراكمي 2
                                        </td>
                                        <td>
                                            {{$person->gpa_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سنه التخرج 2
                                        </td>
                                        <td>
                                            {{$person->year_graduated_2}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            المؤهلات العلمية 3
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            المؤهل العلمي 3
                                        </td>
                                        <td>
                                            {{$person->academic_qualification_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجامعة 3
                                        </td>
                                        <td>
                                            {{$person->university_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 3
                                        </td>
                                        <td>
                                            {{$person->university_locition_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مده الدراسة 3
                                        </td>
                                        <td>
                                            {{$person->num_of_years_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            المعدل التراكمي 3
                                        </td>
                                        <td>
                                            {{$person->gpa_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سنه التخرج 3
                                        </td>
                                        <td>
                                            {{$person->year_graduated_3}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الدورات التدريبية 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الدوره 1
                                        </td>
                                        <td>
                                            {{$person->course_name_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            المده 1
                                        </td>
                                        <td>
                                            {{$person->duration_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الجهة التي اعدتها 1
                                        </td>
                                        <td>
                                            {{$person->sponsor_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            تاريخها 1
                                        </td>
                                        <td>
                                            {{$person->course_date_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 1
                                        </td>
                                        <td>
                                            {{$person->course_location_1}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الدورات التدريبية 2
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الدوره 2
                                        </td>
                                        <td>
                                            {{$person->course_name_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            المده 2
                                        </td>
                                        <td>
                                            {{$person->duration_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الجهة التي اعدتها 2
                                        </td>
                                        <td>
                                            {{$person->sponsor_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            تاريخها 2
                                        </td>
                                        <td>
                                            {{$person->course_date_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 2
                                        </td>
                                        <td>
                                            {{$person->course_location_2}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الدورات التدريبية 3
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الدوره 3
                                        </td>
                                        <td>
                                            {{$person->course_name_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            المده 3
                                        </td>
                                        <td>
                                            {{$person->duration_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الجهة التي اعدتها 3
                                        </td>
                                        <td>
                                            {{$person->sponsor_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            تاريخها 3
                                        </td>
                                        <td>
                                            {{$person->course_date_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 3
                                        </td>
                                        <td>
                                            {{$person->course_location_3}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الدورات التدريبية 4
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الدوره 4
                                        </td>
                                        <td>
                                            {{$person->course_name_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            المده 4
                                        </td>
                                        <td>
                                            {{$person->duration_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الجهة التي اعدتها 4
                                        </td>
                                        <td>
                                            {{$person->sponsor_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            تاريخها 4
                                        </td>
                                        <td>
                                            {{$person->course_date_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 4
                                        </td>
                                        <td>
                                            {{$person->course_location_4}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الدورات التدريبية 5
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الدوره 5
                                        </td>
                                        <td>
                                            {{$person->course_name_5}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            المده 5
                                        </td>
                                        <td>
                                            {{$person->duration_5}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الجهة التي اعدتها 5
                                        </td>
                                        <td>
                                            {{$person->sponsor_5}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            تاريخها 5
                                        </td>
                                        <td>
                                            {{$person->course_date_5}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مكانها 5
                                        </td>
                                        <td>
                                            {{$person->course_location_5}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الوظائف الأخيرة 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجهة 1
                                        </td>
                                        <td>
                                            {{$person->employer_name_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الوظيفة 1
                                        </td>
                                        <td>
                                            {{$person->positica_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ من 1
                                        </td>
                                        <td>
                                            {{$person->date_from_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ الي 1
                                        </td>
                                        <td>
                                            {{$person->date_to_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الراتب الاساسي 1
                                        </td>
                                        <td>
                                            <?="{{ $person->basic_salary_1}}"?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سبب ترك الوظيفة 1
                                        </td>
                                        <td>
                                            <?="{{ $person->reason_for_leaving_1}}"?>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الوظائف الأخيرة 2
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجهة 2
                                        </td>
                                        <td>
                                            {{$person->employer_name_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الوظيفة 2
                                        </td>
                                        <td>
                                            {{$person->positica_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ من 2
                                        </td>
                                        <td>
                                            {{$person->date_from_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ الي 2
                                        </td>
                                        <td>
                                            {{$person->date_to_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الراتب الاساسي 2
                                        </td>
                                        <td>
                                            <?="{{ $person->basic_salary_2}}" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سبب ترك الوظيفة 2
                                        </td>
                                        <td>
                                            <?="{{ $person->reason_for_leaving_2}}" ?>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الوظائف الأخيرة 3
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجهة 3
                                        </td>
                                        <td>
                                            {{$person->employer_name_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الوظيفة 3
                                        </td>
                                        <td>
                                            {{$person->positica_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ من 3
                                        </td>
                                        <td>
                                            {{$person->date_from_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ الي 3
                                        </td>
                                        <td>
                                            {{$person->date_to_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الراتب الاساسي 3
                                        </td>
                                        <td>
                                            <?="{{ $person->basic_salary_3}}" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سبب ترك الوظيفة 3
                                        </td>
                                        <td>
                                            <?="{{ $person->reason_for_leaving_3}}" ?>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            الوظائف الأخيرة 4
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الجهة 4
                                        </td>
                                        <td>
                                            {{$person->employer_name_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الوظيفة 4
                                        </td>
                                        <td>
                                            {{$person->positica_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ من 4
                                        </td>
                                        <td>
                                            {{$person->date_from_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التاريخ الي 4
                                        </td>
                                        <td>
                                            {{$person->date_to_4}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            الراتب الاساسي 4
                                        </td>
                                        <td>
                                            <?="{{ $person->basic_salary_4}}" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            سبب ترك الوظيفة 4
                                        </td>
                                        <td>
                                            <?="{{ $person->reason_for_leaving_4}}" ?>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            إجمالي الدخل الشهري لأخر وظيفة
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            الراتب الأخير
                                        </td>
                                        <td>
                                            {{$person->last_sallary}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            المهارات
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            مهارة 1
                                        </td>
                                        <td>
                                            {{$person->skills_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            مهارة 2
                                        </td>
                                        <td>
                                            {{$person->skills_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مهارة 3
                                        </td>
                                        <td>
                                            {{$person->skills_3}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            مهارة 4
                                        </td>
                                        <td>
                                            {{$person->skills_4}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            اللغة العربية
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            القراءة
                                        </td>
                                        <td>
                                            {{$person->arabic_reading}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الكتابة
                                        </td>
                                        <td>
                                            {{$person->arabic_writing}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التحدث
                                        </td>
                                        <td>
                                            {{$person->arabic_speaking}}
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="no">
                                        <th colspan='12'>
                                            اللغة الإنجليزية
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            القراءة
                                        </td>
                                        <td>
                                            {{$person->english_reading}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الكتابة
                                        </td>
                                        <td>
                                            {{$person->english_writing}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            التحدث
                                        </td>
                                        <td>
                                            {{$person->english_speaking}}
                                        </td>
                                    </tr>
                                </table>
                                <table class="no">
                                    <tr>
                                        <th colspan='12'>
                                            الهوايات
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            الهواية 1
                                        </td>
                                        <td>
                                            {{$person->hobbies_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            الهواية 2
                                        </td>
                                        <td>
                                            {{$person->hobbies_2}}
                                        </td>
                                    </tr>
                                </table>
                                <table class="no">
                                    <tr>
                                        <th colspan='12'>
                                            اشخاص بأمكاننا الأتصال بهم وقت الضرورة
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            اسم الشخص 1
                                        </td>
                                        <td>
                                            {{$person->person_name_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            صله القرابة 1
                                        </td>
                                        <td>
                                            {{$person->person_relationship_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            رقم الهاتف 1
                                        </td>
                                        <td>
                                            {{$person->person_phone_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            العنوان 1
                                        </td>
                                        <td>
                                            {{$person->person_address_1}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            اسم الشخص 2
                                        </td>
                                        <td>
                                            {{$person->person_name_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            صلة القرابة 2
                                        </td>
                                        <td>
                                            {{$person->person_relationship_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            رقم الهاتف 2
                                        </td>
                                        <td>
                                            {{$person->person_phone_2}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                            العنوان 2
                                        </td>
                                        <td>
                                            {{$person->person_address_2}}
                                        </td>
                                    </tr>
                                </table>
                                @if($person->job_name_2 != '' || $person->job_name_2 != null)
                                    <table>
                                        <tr class='no'>
                                            <th colspan='12'>
                                                الخبرة العملية
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                مسمي الوظيفة
                                            </td>
                                            <td>
                                                {{ $person->job_name_2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                جهة العمل
                                            </td>
                                            <td>
                                                {{ $person->job_duration_2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الفترة من
                                            </td>
                                            <td>
                                                {{ $person->pointOFstart_2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الي
                                            </td>
                                            <td>
                                                {{ $person->pointOFend_2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الراتب
                                            </td>
                                            <td>
                                                {{ $person->salary_2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                سبب ترك العمل
                                            </td>
                                            <td>
                                                {{ $person->reasonFORleaving_2}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                صورة شهادة الخبرة العملية
                                            </td>
                                            <td>
                                                <img style='width: 100%;height: 500px;' src='../uploads/{{ $person->attached_2}}'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الواجبات و المسئوليات اثناء عملك
                                            </td>
                                            <td>
                                                {{ $person->responsibilities_2}}
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                                @if( $person->job_name_3 != '' || $person->job_name_3 != null)
                                    <table>
                                        <tr class='no'>
                                            <th colspan='12'>
                                                الخبرة العملية
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                مسمي الوظيفة
                                            </td>
                                            <td>
                                                {{ $person->job_name_3}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                جهة العمل
                                            </td>
                                            <td>
                                                {{ $person->job_duration_3}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الفترة من
                                            </td>
                                            <td>
                                                {{ $person->pointOFstart_3}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الي
                                            </td>
                                            <td>
                                                {{ $person->pointOFend_3}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الراتب
                                            </td>
                                            <td>
                                                {{ $person->salary_3}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                سبب ترك العمل
                                            </td>
                                            <td>
                                                {{ $person->reasonFORleaving_3}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                صورة شهادة الخبرة العملية
                                            </td>
                                            <td>
                                                <img style='width: 100%;height: 500px;' src='../uploads/{{ $person->attached_3}}'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الواجبات و المسئوليات اثناء عملك
                                            </td>
                                            <td>
                                                {{ $person->responsibilities_3}}
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                                @if($person->job_name_4!= '' || $person->job_name_4 != null)
                                    <table>
                                        <tr class='no'>
                                            <th colspan='12'>
                                                الخبرة العملية
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                مسمي الوظيفة
                                            </td>
                                            <td>
                                                {{ $person->job_name_4}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                جهة العمل
                                            </td>
                                            <td>
                                                {{ $person->job_duration_4}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الفترة من
                                            </td>
                                            <td>
                                                {{ $person->pointOFstart_4}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الي
                                            </td>
                                            <td>
                                                {{ $person->pointOFend_4}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الراتب
                                            </td>
                                            <td>
                                                {{ $person->salary_4}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                سبب ترك العمل
                                            </td>
                                            <td>
                                                {{ $person->reasonFORleaving_4}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                صورة شهادة الخبرة العملية
                                            </td>
                                            <td>
                                                <img style='width: 100%;height: 500px;' src='../uploads/{{ $person->attached_4}}'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                الواجبات و المسئوليات اثناء عملك
                                            </td>
                                            <td>
                                                {{ $person->responsibilities_4}}
                                            </td>
                                        </tr>
                                    </table>
                                @endif
                            @endif
                        </div>
                </div> --}}
                <div class="div_1" style="width: 100%; text-align: center; line-height: 15px;">
                    <h2>نموذج السيرة الذاتية</h2>
                    <h2>Personal History Form</h2>
                </div>
                <table style="width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;">
                    <tr>
                        <td style="width: 33%; border: 2px solid black;">
                            <div style="font-weight: bold;color: #5baa59;">رؤية باي لحلول السداد و البرمجيات</div>
                            <div style="margin-top: 10px;">إدارة الموارد البشرية</div>
                        </td>
                        <td style="width: 34%; border: 2px solid black;">
                            <img src="C:\xampp\htdocs\work_FAHD\roaya_form\img\Roaya.png" style="margin-top: 10px; width: 250px; height: auto;" />
                        </td>
                        <td style="width: 33%; border: 2px solid black;">
                            <div style="font-weight: bold;">Roaya Pay for Payment Solutions<br>and Software</div>
                            <div style="margin-top: 10px;">Human Resources Management</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 33%; border: 2px solid black; text-align: center;padding: 5px 0;" colspan="3">
                            <span style="font-weight: bold;color:#005db4;"> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 33%; border: 2px solid black; text-align: right; " colspan="3">
                            <span style="font-weight: bold; margin-right: 25px; margin-left: 550px;"> معلومات شخصية </span>
                            <span style="font-weight: bold;"> Personal Information </span>
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;' >الأسم الأول</span>
                            <span  >First Name</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;'>أسم الأب</span>
                            <span >Middle Name</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'>أسم الجد</span>
                            <span >Grand Father". "'" . "s  Name</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'>أسم العائلة</span>
                            <span >Family Name</span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['first_name'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['second_name'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['third_name'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['last_name'] }}
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                            <span  > National ID</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;'> تاريخ الاصدار</span>
                            <span > Date of Issue</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> مكان الأصدار</span>
                            <span > Place of Issue</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> الجنسية</span>
                            <span > Nationality</span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['national_id'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['date_of_issue'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['place_of_issue'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{$person['nationality'] }}
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 20px;' > مكان الميلاد</span>
                            <span  >Place of Birth</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;'>تاريخ الميلاد </span>
                            <span >Date of Birth</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني  </span>
                            <span style='margin-right: 1px; margin-left: 6px;'> Insurance No.</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> التجنيد </span>
                            <span >conscription</span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['place_of_birth'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_of_birth'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['insurance_num'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['conscription'] }}
                        </td>
                    </tr>
    
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                            <span style='margin-right: 5px; margin-left: 30px;' >الحالة الأجتماعية </span>
                            <span >Marital Status </span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                            <span > no.of Children</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> الوظيفة المطلوبة </span>
                            <span >Job Required </span>
                        </td>
                    </tr>
                    <tr class='row'>
                        @if( $person['marital_status']== 'أعزب')
                            <td style='width: 25%; border: 2px solid black;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> أعزب </span>
                                <span >
                                    <input type='checkbox' checked />
                                </span>
                                <span style='margin-right: 1px; margin-left: 6px;'> Single </span>
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> متزوج </span>
                                <span >
                                    <input type='checkbox' />
                                </span>
                                <span style='margin-right: 1px; margin-left: 6px;'> Married </span>
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                -
                            </td>
                        @elseif($person['marital_status'] == 'متزوج')
                            <td style='width: 25%; border: 2px solid black;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> أعزب </span>
                                <span >
                                    <input type='checkbox' />
                                </span>
                                <span style='margin-right: 1px; margin-left: 6px;'> Single </span>
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> متزوج </span>
                                <span >
                                    <input type='checkbox' checked />
                                </span>
                                <span style='margin-right: 1px; margin-left: 6px;'> Married </span>
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['Num_of_children'] }}
                            </td>
                        @endif
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['job_required'] }}
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                            <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات إضافية </span>
                            <span style='font-weight: bold;'> Additional Information </span>
                        </td>
                    </tr>
    
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                            <span  >Tel.No.</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                            <span >Tel.No.</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> محل السكن </span>
                            <span >Place of Residence</span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['number_tel_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['number_tel_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['place_of_residence'] }}
                        </td>
                    </tr>
    
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                            <span  >Centre / City</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                            <span >Governorate</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 1px; margin-left: 6px;'> الرمز البريدي </span>
                            <span >Area Code</span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['centre']}}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['governorate']}}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['area_code']}}
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                        </td>
                        <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                            {{ $person['employ_email']}}
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span >Email Address</span>
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                            <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> المؤهلات العلمية </span>
                            <span style='font-weight: bold;'> Academic Qualifications </span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p > المؤهل العلمي </p>
                            <p  >Academic Qualification</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p > اسم الجامعة </p>
                            <p >University</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p >مكانها</p>
                            <p > locition </p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p >مدة الدراسة</p>
                            <p >No. of Years</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p >المعدل التراكمي</p>
                            <p >GPA</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p > سنة التخرج </p>
                            <p >Year Graduated</p>
                        </td>
                    </tr>
                    @if($person['academic_qualification_1'] != '' || $person['academic_qualification_1'] != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['academic_qualification_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['university_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['locition_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['num_of_years_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['gpa_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['year_graduated_1'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['academic_qualification_2'] != '' || $person['academic_qualification_2'] != null)
    
                            <tr class='row'>
                                <td style='width: 25%; border: 2px solid black;'>
                                    {{ $person['academic_qualification_2'] }}
                                </td>
                                <td style='width: 25%; border: 2px solid black;'>
                                    {{ $person['university_2'] }}
                                </td>
                                <td style='width: 25%; border: 2px solid black;'>
                                    {{ $person['locition_2'] }}
                                </td>
                                <td style='width: 25%; border: 2px solid black;'>
                                    {{ $person['num_of_years_2'] }}
                                </td>
                                <td style='width: 25%; border: 2px solid black;'>
                                    {{ $person['gpa_2'] }}
                                </td>
                                <td style='width: 25%; border: 2px solid black;'>
                                    {{ $person['year_graduated_2'] }}
                                </td>
                            </tr>
                    @endif
                    @if($person['academic_qualification_3']  != '' || $person['academic_qualification_3']  != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['academic_qualification_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['university_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['locition_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['num_of_years_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['gpa_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['year_graduated_3'] }}
                            </td>
                        </tr>
                    @endif
    
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                            <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                            <span style='font-weight: bold;'> Training courses </span>
                        </td>
                    </tr>
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 8px;'>
                            <p >  اسم الدورة </p>
                            <p  >Course Name</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 8px;'>
                            <p > المده </p>
                            <p >Duration</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 8px;'>
                            <p >الجهة التى اعدتها</p>
                            <p > sponsor </p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 8px;'>
                            <p > تاريخها</p>
                            <p >Date</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 8px;'>
                            <p >مكانها</p>
                            <p >Location</p>
                        </td>
                    </tr>
                    @if($person['course_name_1']  != '' || $person['course_name_1'] != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_name_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['duration_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['sponsor_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_date_1'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_location_1'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['course_name_2']  != '' || $person['course_name_2']  != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_name_2'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['duration_2'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['sponsor_2'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_date_2'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_location_2'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['course_name_3']  != '' || $person['course_name_3']  != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_name_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['duration_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['sponsor_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_date_3'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_location_3'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['course_name_4'] != '' || $person['course_name_4']  != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_name_4'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['duration_4'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['sponsor_4'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_date_4'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_location_4'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['course_name_5']  != '' || $person['course_name_5']  != null)
                        <tr class='row'>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_name_5'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['duration_5'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['sponsor_5'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_date_5'] }}
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['course_location_5'] }}
                            </td>
                        </tr>
                    @endif
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;margin-bottom: 10px;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; padding: 9px 0;' colspan='5'>
                            <span style='font-weight: bold; margin-right: 50px;'>توقيع الموظف على بيانات الصفحة الأولى / ..................................................................................... </span>
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                            <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الوظائف الاخيرة </span>
                            <span style='font-weight: bold;'> Last Jobs </span>
                        </td>
                    </tr>
    
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p >  اسم الجهة </p>
                            <p  >Empolyer Name</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p > اسم الوظيفة </p>
                            <p >Job Name</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p > التاريخ  من </p>
                            <p > Date From</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p > التاريخ  الى </p>
                            <p > Date To</p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p >الراتب الأساسي</p>
                            <p > Basic Salary </p>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <p >سبب ترك الوظيفة</p>
                            <p > Reason for Leaving </p>
                        </td>
                    </tr>
                @if($person['employer_name_1']  != '' || $person['employer_name_1']  != null)
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['employer_name_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['positica_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_from_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_to_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['basic_salary_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['reason_for_leaving_1'] }}
                        </td>
                    </tr>
                @endif
                @if($person['employer_name_2']  != '' || $person['employer_name_2']  != null)
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['employer_name_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['positica_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_from_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_to_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['basic_salary_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['reason_for_leaving_2'] }}
                        </td>
                    </tr>
                @endif
                @if($person['employer_name_3']  != '' || $person['employer_name_3']  != null)
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['employer_name_3'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['positica_3'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_from_3'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_to_3'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['basic_salary_3'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['reason_for_leaving_3'] }}
                        </td>
                    </tr>
                @endif
                @if($person['employer_name_4']  != '' || $person['employer_name_4']  != null)
                    <tr class='row'>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['employer_name_4'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['positica_4'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_from_4'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['date_to_4'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['basic_salary_4'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['reason_for_leaving_4'] }}
                        </td>
                    </tr>
                @endif
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr class='row'>
                        <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                            <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                        </td>
                        <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                            {{ $person['last_sallary']}}
                        </td>
                        <td style='width: 34%; border: 2px solid black;background-color: #ddd;' colspan='3'>
                            <span >Total Monthly Income from Last Job</span>
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                            <span style='font-weight: bold; margin-right: 120px; margin-left: 550px;'> المهارات </span>
                            <span style='font-weight: bold;'> Skills </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <span > 1 </span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <span > 2 </span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <span > 3 </span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                            <span > 4 </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['skills_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['skills_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['skills_3'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['skills_4'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            -
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: ; border: 2px solid black; text-align: center; background: #ddd;' colspan='2'>
                            <span style='font-weight: bold;'> اللغات </span>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; background: #ddd;' colspan='3'>
                            <span style='font-weight: bold;'> القراءة </span>
                            <span style='font-weight: bold;'> Reading </span>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; background: #ddd;' colspan='3'>
                            <span style='font-weight: bold;'> الكتابة </span>
                            <span style='font-weight: bold;'> Writing </span>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; background: #ddd;' colspan='3'>
                            <span style='font-weight: bold;'> التحدث </span>
                            <span style='font-weight: bold;'> Speaking </span>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; background: #ddd;' colspan='2'>
                            <span style='font-weight: bold;'> Languages </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                            <span style='font-weight: bold;'>  </span>
                        </td>
    
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> جيد </p>
                            <p style='font-weight: bold;'> Good </p>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> متوسط </p>
                            <p style='font-weight: bold;'> Fair </p>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> ضعيف </p>
                            <p style='font-weight: bold;'> Poor </p>
                        </td>
    
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> جيد </p>
                            <p style='font-weight: bold;'> Good </p>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> متوسط </p>
                            <p style='font-weight: bold;'> Fair </p>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> ضعيف </p>
                            <p style='font-weight: bold;'> Poor </p>
                        </td>
    
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> جيد </p>
                            <p style='font-weight: bold;'> Good </p>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> متوسط </p>
                            <p style='font-weight: bold;'> Fair </p>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                            <p style='font-weight: bold;'> ضعيف </p>
                            <p style='font-weight: bold;'> Poor </p>
                        </td>
    
                        <td style='width: ; border: 2px solid black; text-align: right; ' colspan='2'>
                            <span style='font-weight: bold;'>  </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                            <span style='font-weight: bold;'> اللغة العربية</span>
                        </td>
                        @if($person['arabic_reading'] == 'جيد')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked disabled/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox'  disabled/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox'  disabled/>
                            </td>
                        @elseif($person['arabic_reading']  == 'متوسط')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' disabled />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked disabled/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' disabled />
                            </td>
                        @elseif($person['arabic_reading'] == 'ضعيف')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox'  disabled/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox'  disabled/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked disabled/>
                            </td>
                        @endif
                        @if($person['arabic_writing'] == 'جيد')
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' checked/>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        @elseif($person['arabic_writing'] == 'متوسط')
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' checked/>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        @elseif($person['arabic_writing'] == 'ضعيف')
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' checked/>
                        </td>
                        @endif
    
                        @if($person['arabic_speaking']  == 'جيد')
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' checked/>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        @elseif($person['arabic_speaking']  == 'متوسط')
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' checked/>
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        @elseif($person['arabic_speaking']  == 'ضعيف')
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' />
                        </td>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                        <input type='checkbox' checked/>
                        </td>
                        @endif
                        <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                            <span style='font-weight: bold;'> arabic </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                            <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                        </td>
                        @if($person['english_reading']  == 'جيد')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                        @elseif($person['english_reading']  == 'متوسط')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                        @elseif($person['english_reading']  == 'ضعيف')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                        @endif
    
                        @if($person['english_writing']  == 'جيد')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                        @elseif($person['english_writing']  == 'متوسط')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                        @elseif($person['english_writing']  == 'ضعيف')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                        @endif
    
                        @if($person['english_speaking']  == 'جيد')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                        @elseif($person['english_speaking']  == 'متوسط')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                        @elseif($person['english_speaking']  == 'ضعيف')
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' />
                            </td>
                            <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                                <input type='checkbox' checked/>
                            </td>
                        @endif
    
                        <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                            <span style='font-weight: bold;'> english </span>
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                            <span style='font-weight: bold; margin-right: 90px; margin-left: 580px;'> الهوايات </span>
                            <span style='font-weight: bold;'> Hobbies </span>
                        </td>
                    </tr>
                    <tr>
                        @if($person['hobbies_1']  !=  '' || $person['hobbies_1']  !=  null)
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['hobbies_1'] }}
                            </td>
                        @endif
                        @if($person['hobbies_2']  !=  '' || $person['hobbies_2']  !=  null)
                            <td style='width: 25%; border: 2px solid black;'>
                                {{ $person['hobbies_2'] }}
                            </td>
                        @endif
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                            <span style='font-weight: bold; margin-right: 40px; margin-left: 200px;'> أشخاص بإمكانك الاتصال بهم في الضرورة</span>
                            <span style='font-weight: bold;'> Persons you could call them in the necessary </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span >  اسم الشخص </span>
                            <span  >Person Name</span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span >  صلة القرابة  </span>
                            <span  > Relation Ship </span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span > رقم الهاتف </span>
                            <span  > Mobile </span>
                        </td>
                        <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                            <span >  العنوان </span>
                            <span  > Address </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_name_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_relationship_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_phone_1'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_address_1'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_name_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_relationship_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_phone_2'] }}
                        </td>
                        <td style='width: 25%; border: 2px solid black;'>
                            {{ $person['person_address_2'] }}
                        </td>
                    </tr>
                </table>
                <h4 style='width: 640px; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
                <table style='width: 100%; text-align: center; margin-top: 50px;'>
                    <tr>
                        <td style='width: 25%;'>
                            <p style='margin-right: -150px;'>تفضلوا بقبول فائق الاحترام والتقدير </p>
                            <p style='margin-top: 20px;'>التوقيع/  ...................................................................... </p>
                            <p style='margin-top: 20px;'>التاريخ/  ...................................................................... </p>
                        </td>
                        <td style='width: 25%; text-align: center;'>
                            <div style='border: 2px solid #000;width:150px;height: 150px; border-radius: 50%;margin-right: 200px;'>
                                <p style='margin-top: 60px;'>ختم الشركة</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;margin-top: 50px;'>
                    <tr>
                        <td style='width: 33%; border: 2px solid black;background-color: #ddd;padding: 15px;'>
                            <span > تقييم المدير المسئول </span>
                        </td>
                        <td style='width: 33%; border: 2px solid black;background-color: #ddd;padding: 15px;'>
                            <span > التقيم بناء على المقابله الشخصية </span>
                        </td>
                        <td style='width: 34%; border: 2px solid black;background-color: #ddd;padding: 15px;'>
                            <span > اعتماد التعين من رئيس مجلس الادارة </span>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 33%; border: 2px solid black;padding: 50px 20px;'>
    
                        </td>
                        <td style='width: 33%; border: 2px solid black;padding: 50px 20px;'>
    
                        </td>
                        <td style='width: 34%; border: 2px solid black;padding: 50px 20px;'>
    
                        </td>
                    </tr>
                </table>
                <table style='height: 100%; width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center; margin-top: 50px;'>
                    <tr>
                        <td style='border: 2px solid black;'>
                            <p>الصورة الشخصية</p>
                            <p>personal image</p>
                        </td>
                        <td style='border: 2px solid black; padding: 60px 20px 80px;'>
                            <img src='". __DIR__ ."uploads/{{ $person['photoOFuser_up']}} alt='Image' style='width: 270px; height: 320x; margin-bottom: -50px'/>
                        </td>
                    </tr>
                    <tr>
                        <td style='border: 2px solid black;'>
                            <p> صورة البطاقة / امام </p>
                            <p> front image </p>
                        </td>
                        <td style='border: 2px solid black; padding: 60px 20px 80px;'>
                            <img src='". __DIR__ ."uploads/$person[frontOFcard_up]' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                        </td>
                    </tr>
                    <tr>
                        <td style='border: 2px solid black;'>
                            <p> صورة البطاقة / خلف </p>
                            <p> back image </p>
                        </td>
                        <td style='border: 2px solid black; padding: 60px 20px 80px;'>
                            <img src='". __DIR__ ."uploads/$person[backOFcard_up]' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <!-- alert -->
        <div class="alert alert-success d-none" role="alert" id="alert"></div>
        <!-- id form -->
        @include('addition.settings');
        <!-- js files -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/all.min.js') }}"></script>
        <script src="{{ asset('js/menu.js') }}"></script>
        <script src="{{ asset('js/unpkg.com_xlsx@0.15.1_dist_xlsx.full.min.js') }}"></script>
        <script src="{{ asset('js/pdf.bundle.min.js') }}"></script>
        <script src="{{ asset('js/pdf.bundle.js') }}"></script>
        <script src="{{ asset('js/export.js') }}"></script>
        <script>
            // منع الرجوع للصفحة السابقة
            //
            // document.querySelector('.settings').style.display = 'none';
        </script>
    </body>
</html>
