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
        <link rel="stylesheet" href="{{ asset('css/staff_data.css') }}">
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
                <div class='title-info'>
                    <p>بيانات الموظفين</p>
                    <div class='btns-export-group'>
                        <button class='btn export mx-2' id="export">التصدير الي pdf</button>
                    </div>
                </div>
                <form novalidate>
                    <div class='modal-header text-light'>
                    <h5 class='modal-title' id='showdataTitle'> نموذج السيرة الذاتية
                        <span style="color: #5aaa57;">
                            {{$person['first_name'] }} {{$person['second_name'] }} {{$person['third_name'] }} {{$person['last_name'] }}
                        </span>
                    </h5>
                    </div>
                </form>
                <div class="cv_container">
                    <table style="width: 100%;  border-collapse: collapse; text-align: center;">
                        <tr>
                            <td style="width: 33%; ">
                                <div style="font-weight: bold;color: #5baa59;">رؤية باي لحلول السداد و البرمجيات</div>
                                <div style="margin-top: 10px;">إدارة الموارد البشرية</div>
                            </td>
                            <td style="width: 34%; ">
                                <img src="{{ asset('img/Roaya.png') }}" style="margin-top: 10px; width: 250px; height: auto;" />
                            </td>
                            <td style="width: 33%; ">
                                <div style="font-weight: bold;">Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style="margin-top: 10px;">Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%;  text-align: center;padding: 5px 0;" colspan="3">
                                <span style="font-weight: bold;color:#005db4;"> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33%;  text-align: center; " colspan="3">
                                <span style="font-weight: bold; margin-right: 25px; margin-left: 550px;"> معلومات شخصية </span>
                                <span style="font-weight: bold;"> Personal Information </span>
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr class='row'>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;' >الأسم الأول</span>
                                <span  >First Name</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;'>أسم الأب</span>
                                <span >Middle Name</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'>أسم الجد</span>
                                <span >Grand Father's  Name</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'>أسم العائلة</span>
                                <span >Family Name</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 25%; '>
                                {{$person['first_name'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{$person['second_name'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{$person['third_name'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{$person['last_name'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                                <span  > National ID</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> الجنسية</span>
                                <span > Nationality</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;'>تاريخ الميلاد </span>
                                <span >Date of Birth</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 20px;' > مكان الميلاد</span>
                                <span  >Place of Birth</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 25%; '>
                                {{$person['national_id'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{$person['nationality'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['date_of_birth'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['place_of_birth'] }}
                            </td>
                        </tr>
                        <tr class='row'>

                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> التجنيد </span>
                                <span >conscription</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'colspan='2'>
                                <span style='margin-right: 5px; margin-left: 30px;' >الحالة الأجتماعية </span>
                                <span >Marital Status </span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                                <span > no.of Children</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني  </span>
                                <span style='margin-right: 1px; margin-left: 6px;'> Insurance No.</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 25%; '>
                                {{ $person['conscription'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['marital_status'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['Num_of_children'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['insurance_num'] }}
                            </td>
                        </tr>

                        <tr class='row'>
                            <td style='width: 100%; background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> الوظيفة المطلوبة </span>
                                <span >Job Required </span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 100%; '>
                                {{ $person['job_required'] }}
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات إضافية </span>
                                <span style='font-weight: bold;'> Additional Information </span>
                            </td>
                        </tr>

                        <tr class='row'>
                            <td style='width: 50%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                                <span  >Tel.No.</span>
                            </td>
                            <td style='width: 50%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                                <span >Tel.No.</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; '>
                                {{ $person['number_tel_1'] }}
                            </td>
                            <td style='width: 50%; '>
                                {{ $person['number_tel_2'] }}
                            </td>
                        </tr>

                        <tr class='row'>
                            <td style='width: calc(100% / 3); background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                                <span >Governorate</span>
                            </td>
                            <td style='width: calc(100% / 3); background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                                <span  >Centre / City</span>
                            </td>
                            <td style='width: calc(100% / 3); background-color: #ddd;'>
                                <span style='margin-right: 1px; margin-left: 6px;'> محل السكن </span>
                                <span >Place of Residence</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: calc(100% / 3); '>
                                {{ $person['governorate']}}
                            </td>
                            <td style='width: calc(100% / 3); '>
                                {{ $person['centre']}}
                            </td>
                            <td style='width: calc(100% / 3); '>
                                {{ $person['place_of_residence'] }}
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr class='row'>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                            </td>
                            <td style='width: 50%; color: #f00; font-size: 16px;' colspan='2'>
                                {{ $person['employ_email']}}
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span >Email Address</span>
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='6'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> المؤهل الدراسي </span>
                                <span style='font-weight: bold;'> Educational Qualification </span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span> المؤهل الدراسي </span>
                                <span  >Educational Qualification</span>
                            </td>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span > التخصص العلمي </span>
                                <span >Scientific Specialization</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; '>
                                {{ $person['academic_qualification_1'] }}
                            </td>
                            <td style='width: 50%; '>
                                {{ $person['scientific_specialization_1'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span > سنة التخرج </span>
                                <span >Year Graduated</span>
                            </td>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span > جهة المؤهل </span>
                                <span >Qualification authority</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; '>
                                {{ $person['year_graduated_1'] }}
                            </td>
                            <td style='width: 50%; '>
                                {{ $person['university_1'] }}
                            </td>
                        </tr>

                        <tr class='row'>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span> الدراسة العليا</span>
                                <span  >Postgraduate Studies</span>
                            </td>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span > التخصص العلمي </span>
                                <span >Scientific Specialization</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; '>
                                {{ $person['academic_qualification_2'] }}
                            </td>
                            <td style='width: 50%; '>
                                {{ $person['scientific_specialization_2'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span > سنة التخرج </span>
                                <span >Year Graduated</span>
                            </td>
                            <td style='width: 50%; background-color: #ddd; '>
                                <span > جهة المؤهل </span>
                                <span >Qualification authority</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 50%; '>
                                {{ $person['year_graduated_2'] }}
                            </td>
                            <td style='width: 50%; '>
                                {{ $person['university_2'] }}
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='5'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                                <span style='font-weight: bold;'> Training courses </span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 20%; background-color: #ddd; '>
                                <span>  اسم الدورة </span>
                                <span>Course Name</span>
                            </td>
                            <td style='width: 20%; background-color: #ddd; '>
                                <span> المده </span>
                                <span>Duration</span>
                            </td>
                            <td style='width: 20%; background-color: #ddd; '>
                                <span> تاريخها</span>
                                <span>Date</span>
                            </td>
                            <td style='width: 20%; background-color: #ddd; '>
                                <span>الجهة الدورة</span>
                                <span> sponsor </span>
                            </td>
                            <td style='width: 20%; background-color: #ddd; '>
                                <span>مكانها</span>
                                <span>Location</span>
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 20%; '>
                                {{ $person['course_name_1'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['duration_1'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_date_1'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['sponsor_1'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_location_1'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 20%; '>
                                {{ $person['course_name_2'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['duration_2'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_date_2'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['sponsor_2'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_location_2'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 20%; '>
                                {{ $person['course_name_3'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['duration_3'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_date_3'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['sponsor_3'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_location_3'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 20%; '>
                                {{ $person['course_name_4'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['duration_4'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_date_4'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['sponsor_4'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_location_4'] }}
                            </td>
                        </tr>
                        <tr class='row'>
                            <td style='width: 20%; '>
                                {{ $person['course_name_5'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['duration_5'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_date_5'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['sponsor_5'] }}
                            </td>
                            <td style='width: 20%; '>
                                {{ $person['course_location_5'] }}
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='6'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الوظائف السابقة </span>
                                <span style='font-weight: bold;'> Last Jobs </span>
                            </td>
                        </tr>

                        <tr class='row'>
                            <td style='width: calc( 100% /6 ); background-color: #ddd; '>
                                <span>  اسم الجهة </span>
                                <span>Empolyer Name</span>
                            </td>
                            <td style='width: calc( 100% /6 ); background-color: #ddd; '>
                                <span > اسم الوظيفة </span>
                                <span >Job Name</span>
                            </td>
                            <td style='width: calc( 100% /6 ); background-color: #ddd; '>
                                <span > التاريخ  من </span>
                                <span > Date From</span>
                            </td>
                            <td style='width: calc( 100% /6 ); background-color: #ddd; '>
                                <span > التاريخ  الى </span>
                                <span > Date To</span>
                            </td>
                            <td style='width: calc( 100% /6 ); background-color: #ddd; '>
                                <span >الراتب الأساسي</span>
                                <span > Basic Salary </span>
                            </td>
                            <td style='width: calc( 100% /6 ); background-color: #ddd; '>
                                <span >سبب ترك الوظيفة</span>
                                <span > Reason for Leaving </span>
                            </td>
                        </tr>
                    @if($person['employer_name_1']  != '' || $person['employer_name_1']  != null)
                        <tr class='row'>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['employer_name_1'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['positica_1'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_from_1'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_to_1'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['basic_salary_1'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['reason_for_leaving_1'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['employer_name_2']  != '' || $person['employer_name_2']  != null)
                        <tr class='row'>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['employer_name_2'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['positica_2'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_from_2'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_to_2'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['basic_salary_2'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['reason_for_leaving_2'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['employer_name_3']  != '' || $person['employer_name_3']  != null)
                        <tr class='row'>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['employer_name_3'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['positica_3'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_from_3'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_to_3'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['basic_salary_3'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['reason_for_leaving_3'] }}
                            </td>
                        </tr>
                    @endif
                    @if($person['employer_name_4']  != '' || $person['employer_name_4']  != null)
                        <tr class='row'>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['employer_name_4'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['positica_4'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_from_4'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['date_to_4'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['basic_salary_4'] }}
                            </td>
                            <td style='width: calc( 100% /6 ); '>
                                {{ $person['reason_for_leaving_4'] }}
                            </td>
                        </tr>
                    @endif
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr class='row'>
                            <td style='width: 33%; background-color: #ddd;' colspan='2'>
                                <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                            </td>
                            <td style='width: 33%; color: #5baa59; font-size: 20px;' colspan='1'>
                                {{ $person['last_sallary']}}
                            </td>
                            <td style='width: 34%; background-color: #ddd;' colspan='3'>
                                <span >Total Monthly Income from Last Job</span>
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='6'>
                                <span style='font-weight: bold; margin-right: 120px; margin-left: 550px;'> المهارات </span>
                                <span style='font-weight: bold;'> Skills </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; background-color: #ddd; '>
                                <span > 1 </span>
                            </td>
                            <td style='width: 25%; background-color: #ddd; '>
                                <span > 2 </span>
                            </td>
                            <td style='width: 25%; background-color: #ddd; '>
                                <span > 3 </span>
                            </td>
                            <td style='width: 25%; background-color: #ddd; '>
                                <span > 4 </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; '>
                                {{ $person['skills_1'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['skills_2'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['skills_3'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['skills_4'] }}
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: ;  text-align: center; background: #ddd;' colspan='2'>
                                <span style='font-weight: bold;'> اللغات </span>
                            </td>
                            <td style='width: ;  text-align: center; background: #ddd;' colspan='3'>
                                <span style='font-weight: bold;'> القراءة </span>
                                <span style='font-weight: bold;'> Reading </span>
                            </td>
                            <td style='width: ;  text-align: center; background: #ddd;' colspan='3'>
                                <span style='font-weight: bold;'> الكتابة </span>
                                <span style='font-weight: bold;'> Writing </span>
                            </td>
                            <td style='width: ;  text-align: center; background: #ddd;' colspan='3'>
                                <span style='font-weight: bold;'> التحدث </span>
                                <span style='font-weight: bold;'> Speaking </span>
                            </td>
                            <td style='width: ;  text-align: center; background: #ddd;' colspan='2'>
                                <span style='font-weight: bold;'> Languages </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: ;  text-align: center; ' colspan='2'>
                                <span style='font-weight: bold;'>  </span>
                            </td>

                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> جيد </span>
                                <span style='font-weight: bold;'> Good </span>
                            </td>
                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> متوسط </span>
                                <span style='font-weight: bold;'> Fair </span>
                            </td>
                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> ضعيف </span>
                                <span style='font-weight: bold;'> Poor </span>
                            </td>

                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> جيد </span>
                                <span style='font-weight: bold;'> Good </span>
                            </td>
                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> متوسط </span>
                                <span style='font-weight: bold;'> Fair </span>
                            </td>
                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> ضعيف </span>
                                <span style='font-weight: bold;'> Poor </span>
                            </td>

                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> جيد </span>
                                <span style='font-weight: bold;'> Good </span>
                            </td>
                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> متوسط </span>
                                <span style='font-weight: bold;'> Fair </span>
                            </td>
                            <td style='width: ;  text-align: center; '>
                                <span style='font-weight: bold;'> ضعيف </span>
                                <span style='font-weight: bold;'> Poor </span>
                            </td>

                            <td style='width: ;  text-align: center; ' colspan='2'>
                                <span style='font-weight: bold;'>  </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: ;  text-align: center; ' colspan='2'>
                                <span style='font-weight: bold;'> اللغة العربية</span>
                            </td>
                            @if($person['arabic_reading'] == 'جيد')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' checked disabled/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox'  disabled/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox'  disabled/>
                                </td>
                            @elseif($person['arabic_reading']  == 'متوسط')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' checked disabled/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['arabic_reading'] == 'ضعيف')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox'  disabled/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox'  disabled/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' checked disabled/>
                                </td>
                            @endif
                            @if($person['arabic_writing'] == 'جيد')
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' checkeddisabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox'disabled  />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            @elseif($person['arabic_writing'] == 'متوسط')
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled checked/>
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            @elseif($person['arabic_writing'] == 'ضعيف')
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled checked/>
                            </td>
                            @endif

                            @if($person['arabic_speaking']  == 'جيد')
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled checked/>
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            @elseif($person['arabic_speaking']  == 'متوسط')
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled checked/>
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            @elseif($person['arabic_speaking']  == 'ضعيف')
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled />
                            </td>
                            <td style='width: ;  text-align: center; '>
                            <input type='checkbox' disabled checked/>
                            </td>
                            @endif
                            <td style='width: ;  text-align: center; ' colspan='2'>
                                <span style='font-weight: bold;'> arabic </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: ;  text-align: center; ' colspan='2'>
                                <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                            </td>
                            @if($person['english_reading']  == 'جيد')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['english_reading']  == 'متوسط')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['english_reading']  == 'ضعيف')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                            @endif

                            @if($person['english_writing']  == 'جيد')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['english_writing']  == 'متوسط')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['english_writing']  == 'ضعيف')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                            @endif

                            @if($person['english_speaking']  == 'جيد')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['english_speaking']  == 'متوسط')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                            @elseif($person['english_speaking']  == 'ضعيف')
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled />
                                </td>
                                <td style='width: ;  text-align: center; '>
                                    <input type='checkbox' disabled checked/>
                                </td>
                            @endif

                            <td style='width: ;  text-align: center; ' colspan='2'>
                                <span style='font-weight: bold;'> english </span>
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='6'>
                                <span style='font-weight: bold; margin-right: 90px; margin-left: 580px;'> الهوايات </span>
                                <span style='font-weight: bold;'> Hobbies </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 50%; '>
                                {{ $person['hobbies_1'] }}
                            </td>
                            <td style='width: 50%; '>
                                {{ $person['hobbies_2'] }}
                            </td>
                        </tr>
                    </table>
                    <table style='width: 100%;  border-collapse: collapse; text-align: center;'>
                        <tr>
                            <td style='width: 33%;  text-align: center; ' colspan='6'>
                                <span style='font-weight: bold; margin-right: 40px; margin-left: 200px;'> أشخاص بإمكانك الاتصال بهم في الضرورة</span>
                                <span style='font-weight: bold;'> Persons you could call them in the necessary </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span >  اسم الشخص </span>
                                <span  >Person Name</span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span >  صلة القرابة  </span>
                                <span  > Relation Ship </span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span > رقم الهاتف </span>
                                <span  > Mobile </span>
                            </td>
                            <td style='width: 25%; background-color: #ddd;'>
                                <span >  العنوان </span>
                                <span  > Address </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; '>
                                {{ $person['person_name_1'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['person_relationship_1'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['person_phone_1'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['person_address_1'] }}
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; '>
                                {{ $person['person_name_2'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['person_relationship_2'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['person_phone_2'] }}
                            </td>
                            <td style='width: 25%; '>
                                {{ $person['person_address_2'] }}
                            </td>
                        </tr>
                    </table>
                    <table style=' width: 100%;  border-collapse: collapse; text-align: center; margin-top: 50px;'>
                        <tr>
                            <td style='color: #000;'>
                                <p>الصورة الشخصية</p>
                                <p>personal image</p>
                            </td>
                            <td style=' '>
                                <img src="{{ asset('storage/'.$person->photoOFuser_up) }}" alt='Image' style='width: 270px; height: 320px; '/>
                            </td>
                        </tr>
                        <tr>
                            <td style='color: #000;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style=' '>
                                <img src="{{ asset('storage/'.$person->backOFcard_up) }}" alt="Egyptian national ID card front side showing personal details and official stamps in a formal document layout with Arabic text and a neutral tone" style="width: 550px; height: 300px; "/>
                            </td>
                        </tr>
                        <tr>
                            <td style='color: #000;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style=' '>
                                <img src="{{ asset('storage/'.$person->frontOFcard_up) }}" alt='Image' style='width: 550px; height: 300px; '/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <!-- alert -->
        <div class="alert alert-success d-none" role="alert" id="alert"></div>
        <!-- id form -->

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
