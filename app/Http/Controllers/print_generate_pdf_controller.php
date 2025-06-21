<?php

namespace App\Http\Controllers;

use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use App\Models\Employee_specific_model;
use App\Models\Employee_appointed_model;
use App\Models\Employee_postpone_model;
use App\Models\delete_specific_model;
use App\Models\delete_appointed_model;
use App\Models\delete_postpone_model;

class print_generate_pdf_controller extends Controller
{

    public function indexPDF(Request $request)
    {
        $id = $request->person_id;
        $person = Employee_specific_model::find($id,['*']);

        $frontPath = str_replace('\\', '/', public_path("storage/" . $person->frontOFcard_up));
        $backPath = str_replace('\\', '/', public_path("storage/" . $person->backOFcard_up));
        $userphoto = str_replace('\\', '/', public_path("storage/" . $person->photoOFuser_up));

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
            $frontimagePath = 'file:///' . $frontPath;
            $backimagePath = 'file:///' . $backPath;
            $userimagePath = 'file:///' . $userphoto;
            $fontPath = 'file:///' . str_replace('\\', '/', public_path('fonts/Cairo-Regular.ttf'));
        } else {
            $imgPath = asset('img/Roaya.png');
            $frontimagePath = asset($frontPath);
            $backimagePath = asset($backPath);
            $userimagePath = asset($userphoto);
            $fontPath = asset('fonts/Cairo-Regular.ttf');
        }

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
        } else {
            $imgPath = asset('img/Roaya.png');
        }

        // $id = $request->person_id;
        $html = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Print CV</title>
                    <style>
                        @font-face {
                            font-family: "Cairo";
                            src: url("'. $fontPath .'");
                        }

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
        ';
        $html .= "
                                <img src='$imgPath' style='width: 90%;'/>
                            </td>
                            <td style='width: 33%; border: 2px solid black;'>
                                <div style='font-weight: bold;'>Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style='margin-top: 10px;'>Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: center;padding: 1px 0;'  colspan='3'>
                                <span style='font-weight: bold;color:#005db4;'> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات شخصية </span>
                                <span style='font-weight: bold;'> Personal Information </span>
                            </td>
                        </tr>
                    </table>
        ";
        $html .= "
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
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
                        $person->first_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->second_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->third_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->last_name
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                        <span  > National ID</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'>  الجنسية</span>
                        <span > Nationality</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>تاريخ الميلاد  </span>
                        <span >Date of Birth</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> مكان الميلاد</span>
                        <span  >Place of Birth</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->national_id
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->nationality
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_of_birth
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_birth
                    </td>
                </tr>

                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 20px;' > التجنيد </span>
                        <span  >conscription</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 2px;'>الحالة الأجتماعية </span>
                        <span >Marital Status</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                        <span style='margin-right: 1px; margin-left: 6px;'> No.of Children</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني   </span>
                        <span >Insurance No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->conscription
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->marital_status
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->Num_of_children
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->insurance_num
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >الوظيفة المطلوبة   </span>
                        <span >Job Required </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 100%; border: 2px solid black;'>
                        $person->job_required
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black; text-align: right; '  colspan='3'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> معلومات إضافية </span>
                        <span style='font-weight: bold;'> Additional Information </span>
                    </td>
                </tr>

                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                        <span  >Tel.No.</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                        <span >Tel.No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_1
                    </td>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_2
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                        <span >Governorate</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                        <span  >Centre / City</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>محل السكن</span>
                        <span >Place of Residence </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->governorate
                        </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->centre
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_residence
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                        $person->employ_email
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > Email Address  </span>
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 30px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> المؤهلات الدراسي </span>
                        <span style='font-weight: bold;'> Educational Qualifications </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> المؤهل الدراسي </span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_1
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الدراسة العليا</span>
                        <span style='font-weight: bold;'> Postgraduate Studies </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> الدراسة العليا</span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_2
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_2
                    </td>
                </tr>
            </table>

            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                        <span style='font-weight: bold;'> Training courses </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >  اسم الدورة </span>
                        <span  >Course</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > المده </span>
                        <span >Duration</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > تاريخها</span>
                        <span >Date</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >الجهة الدورة</span>
                        <span > sponsor </span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >مكانها</span>
                        <span >Location</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_4
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_5
                    </td>
                </tr>
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
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_4
                    </td>
                </tr>
            </table>
        ";
        $html .="
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                    </td>
                    <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                        $person->last_sallary
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
                        $person->skills_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_4
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
        ";
        if($person->arabic_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        $html .="
                <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                    <span style='font-weight: bold;'> arabic </span>
                </td>
            </tr>
            <tr>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                    <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                </td>
        ";

        if($person->english_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }
        $html .="
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
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_2
                    </td>
        ";
        $html .="
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
                                $person->person_name_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_1
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_name_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_2
                            </td>
                        </tr>
                    </table>
                    <h4 style='width: 100%; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
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
                                <img src='$userimagePath' alt='Image' style='width: 270px; height: 320x; margin-bottom: -70px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 60px 20px 30px;'>
                                <img src='$frontimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -20px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 40px 20px 10px;'>
                                <img src='$backimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        return SnappyPdf::loadHTML($html, [
            'enable-local-file-access' => true,
            'encoding' => 'UTF-8',
            'page-size' => 'A4',
        ])->inline($request->name .'.pdf');
    }
    public function appointedPDF(Request $request)
    {
        $id = $request->person_id;
        $person = Employee_appointed_model::find($id,['*']);

        $frontPath = str_replace('\\', '/', public_path("storage/" . $person->frontOFcard_up));
        $backPath = str_replace('\\', '/', public_path("storage/" . $person->backOFcard_up));
        $userphoto = str_replace('\\', '/', public_path("storage/" . $person->photoOFuser_up));

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
            $frontimagePath = 'file:///' . $frontPath;
            $backimagePath = 'file:///' . $backPath;
            $userimagePath = 'file:///' . $userphoto;
            $fontPath = 'file:///' . str_replace('\\', '/', public_path('fonts/Cairo-Regular.ttf'));
        } else {
            $imgPath = asset('img/Roaya.png');
            $frontimagePath = asset($frontPath);
            $backimagePath = asset($backPath);
            $userimagePath = asset($userphoto);
            $fontPath = asset('fonts/Cairo-Regular.ttf');
        }

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
        } else {
            $imgPath = asset('img/Roaya.png');
        }

        // $id = $request->person_id;
        $html = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Print CV</title>
                    <style>
                        @font-face {
                            font-family: "Cairo";
                            src: url("'. $fontPath .'");
                        }

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
        ';
        $html .= "
                                <img src='$imgPath' style='width: 90%;'/>
                            </td>
                            <td style='width: 33%; border: 2px solid black;'>
                                <div style='font-weight: bold;'>Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style='margin-top: 10px;'>Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: center;padding: 1px 0;'  colspan='3'>
                                <span style='font-weight: bold;color:#005db4;'> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات شخصية </span>
                                <span style='font-weight: bold;'> Personal Information </span>
                            </td>
                        </tr>
                    </table>
        ";
        $html .= "
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
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
                        $person->first_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->second_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->third_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->last_name
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                        <span  > National ID</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'>  الجنسية</span>
                        <span > Nationality</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>تاريخ الميلاد  </span>
                        <span >Date of Birth</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> مكان الميلاد</span>
                        <span  >Place of Birth</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->national_id
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->nationality
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_of_birth
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_birth
                    </td>
                </tr>

                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 20px;' > التجنيد </span>
                        <span  >conscription</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 2px;'>الحالة الأجتماعية </span>
                        <span >Marital Status</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                        <span style='margin-right: 1px; margin-left: 6px;'> No.of Children</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني   </span>
                        <span >Insurance No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->conscription
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->marital_status
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->Num_of_children
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->insurance_num
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >الوظيفة المطلوبة   </span>
                        <span >Job Required </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 100%; border: 2px solid black;'>
                        $person->job_required
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black; text-align: right; '  colspan='3'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> معلومات إضافية </span>
                        <span style='font-weight: bold;'> Additional Information </span>
                    </td>
                </tr>

                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                        <span  >Tel.No.</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                        <span >Tel.No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_1
                    </td>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_2
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                        <span >Governorate</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                        <span  >Centre / City</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>محل السكن</span>
                        <span >Place of Residence </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->governorate
                        </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->centre
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_residence
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                        $person->employ_email
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > Email Address  </span>
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 30px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> المؤهلات الدراسي </span>
                        <span style='font-weight: bold;'> Educational Qualifications </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> المؤهل الدراسي </span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_1
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الدراسة العليا</span>
                        <span style='font-weight: bold;'> Postgraduate Studies </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> الدراسة العليا</span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_2
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_2
                    </td>
                </tr>
            </table>

            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                        <span style='font-weight: bold;'> Training courses </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >  اسم الدورة </span>
                        <span  >Course</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > المده </span>
                        <span >Duration</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > تاريخها</span>
                        <span >Date</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >الجهة الدورة</span>
                        <span > sponsor </span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >مكانها</span>
                        <span >Location</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_4
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_5
                    </td>
                </tr>
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
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_4
                    </td>
                </tr>
            </table>
        ";
        $html .="
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                    </td>
                    <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                        $person->last_sallary
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
                        $person->skills_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_4
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
        ";
        if($person->arabic_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        $html .="
                <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                    <span style='font-weight: bold;'> arabic </span>
                </td>
            </tr>
            <tr>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                    <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                </td>
        ";

        if($person->english_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }
        $html .="
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
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_2
                    </td>
        ";
        $html .="
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
                                $person->person_name_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_1
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_name_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_2
                            </td>
                        </tr>
                    </table>
                    <h4 style='width: 100%; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
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
                                <img src='$userimagePath' alt='Image' style='width: 270px; height: 320x; margin-bottom: -70px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 60px 20px 30px;'>
                                <img src='$frontimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -20px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 40px 20px 10px;'>
                                <img src='$backimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        return SnappyPdf::loadHTML($html, [
            'enable-local-file-access' => true,
            'encoding' => 'UTF-8',
            'page-size' => 'A4',
        ])->inline($request->name .'.pdf');
    }
    public function postponePDF(Request $request)
    {
        $id = $request->person_id;
        $person = Employee_postpone_model::find($id,['*']);

        $frontPath = str_replace('\\', '/', public_path("storage/" . $person->frontOFcard_up));
        $backPath = str_replace('\\', '/', public_path("storage/" . $person->backOFcard_up));
        $userphoto = str_replace('\\', '/', public_path("storage/" . $person->photoOFuser_up));

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
            $frontimagePath = 'file:///' . $frontPath;
            $backimagePath = 'file:///' . $backPath;
            $userimagePath = 'file:///' . $userphoto;
            $fontPath = 'file:///' . str_replace('\\', '/', public_path('fonts/Cairo-Regular.ttf'));
        } else {
            $imgPath = asset('img/Roaya.png');
            $frontimagePath = asset($frontPath);
            $backimagePath = asset($backPath);
            $userimagePath = asset($userphoto);
            $fontPath = asset('fonts/Cairo-Regular.ttf');
        }

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
        } else {
            $imgPath = asset('img/Roaya.png');
        }

        // $id = $request->person_id;
        $html = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Print CV</title>
                    <style>
                        @font-face {
                            font-family: "Cairo";
                            src: url("'. $fontPath .'");
                        }

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
        ';
        $html .= "
                                <img src='$imgPath' style='width: 90%;'/>
                            </td>
                            <td style='width: 33%; border: 2px solid black;'>
                                <div style='font-weight: bold;'>Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style='margin-top: 10px;'>Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: center;padding: 1px 0;'  colspan='3'>
                                <span style='font-weight: bold;color:#005db4;'> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات شخصية </span>
                                <span style='font-weight: bold;'> Personal Information </span>
                            </td>
                        </tr>
                    </table>
        ";
        $html .= "
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
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
                        $person->first_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->second_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->third_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->last_name
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                        <span  > National ID</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'>  الجنسية</span>
                        <span > Nationality</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>تاريخ الميلاد  </span>
                        <span >Date of Birth</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> مكان الميلاد</span>
                        <span  >Place of Birth</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->national_id
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->nationality
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_of_birth
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_birth
                    </td>
                </tr>

                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 20px;' > التجنيد </span>
                        <span  >conscription</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 2px;'>الحالة الأجتماعية </span>
                        <span >Marital Status</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                        <span style='margin-right: 1px; margin-left: 6px;'> No.of Children</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني   </span>
                        <span >Insurance No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->conscription
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->marital_status
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->Num_of_children
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->insurance_num
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >الوظيفة المطلوبة   </span>
                        <span >Job Required </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 100%; border: 2px solid black;'>
                        $person->job_required
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black; text-align: right; '  colspan='3'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> معلومات إضافية </span>
                        <span style='font-weight: bold;'> Additional Information </span>
                    </td>
                </tr>

                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                        <span  >Tel.No.</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                        <span >Tel.No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_1
                    </td>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_2
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                        <span >Governorate</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                        <span  >Centre / City</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>محل السكن</span>
                        <span >Place of Residence </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->governorate
                        </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->centre
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_residence
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                        $person->employ_email
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > Email Address  </span>
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 30px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> المؤهلات الدراسي </span>
                        <span style='font-weight: bold;'> Educational Qualifications </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> المؤهل الدراسي </span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_1
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الدراسة العليا</span>
                        <span style='font-weight: bold;'> Postgraduate Studies </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> الدراسة العليا</span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_2
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_2
                    </td>
                </tr>
            </table>

            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                        <span style='font-weight: bold;'> Training courses </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >  اسم الدورة </span>
                        <span  >Course</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > المده </span>
                        <span >Duration</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > تاريخها</span>
                        <span >Date</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >الجهة الدورة</span>
                        <span > sponsor </span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >مكانها</span>
                        <span >Location</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_4
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_5
                    </td>
                </tr>
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
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_4
                    </td>
                </tr>
            </table>
        ";
        $html .="
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                    </td>
                    <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                        $person->last_sallary
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
                        $person->skills_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_4
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
        ";
        if($person->arabic_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        $html .="
                <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                    <span style='font-weight: bold;'> arabic </span>
                </td>
            </tr>
            <tr>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                    <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                </td>
        ";

        if($person->english_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }
        $html .="
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
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_2
                    </td>
        ";
        $html .="
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
                                $person->person_name_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_1
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_name_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_2
                            </td>
                        </tr>
                    </table>
                    <h4 style='width: 100%; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
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
                                <img src='$userimagePath' alt='Image' style='width: 270px; height: 320x; margin-bottom: -70px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 60px 20px 30px;'>
                                <img src='$frontimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -20px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 40px 20px 10px;'>
                                <img src='$backimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        return SnappyPdf::loadHTML($html, [
            'enable-local-file-access' => true,
            'encoding' => 'UTF-8',
            'page-size' => 'A4',
        ])->inline($request->name .'.pdf');
    }
    public function del_indexPDF(Request $request)
    {
        $id = $request->person_id;
        $person = delete_specific_model::find($id,['*']);

        $frontPath = str_replace('\\', '/', public_path("storage/" . $person->frontOFcard_up));
        $backPath = str_replace('\\', '/', public_path("storage/" . $person->backOFcard_up));
        $userphoto = str_replace('\\', '/', public_path("storage/" . $person->photoOFuser_up));

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
            $frontimagePath = 'file:///' . $frontPath;
            $backimagePath = 'file:///' . $backPath;
            $userimagePath = 'file:///' . $userphoto;
            $fontPath = 'file:///' . str_replace('\\', '/', public_path('fonts/Cairo-Regular.ttf'));
        } else {
            $imgPath = asset('img/Roaya.png');
            $frontimagePath = asset($frontPath);
            $backimagePath = asset($backPath);
            $userimagePath = asset($userphoto);
            $fontPath = asset('fonts/Cairo-Regular.ttf');
        }

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
        } else {
            $imgPath = asset('img/Roaya.png');
        }

        // $id = $request->person_id;
        $html = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Print CV</title>
                    <style>
                        @font-face {
                            font-family: "Cairo";
                            src: url("'. $fontPath .'");
                        }

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
        ';
        $html .= "
                                <img src='$imgPath' style='width: 90%;'/>
                            </td>
                            <td style='width: 33%; border: 2px solid black;'>
                                <div style='font-weight: bold;'>Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style='margin-top: 10px;'>Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: center;padding: 1px 0;'  colspan='3'>
                                <span style='font-weight: bold;color:#005db4;'> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات شخصية </span>
                                <span style='font-weight: bold;'> Personal Information </span>
                            </td>
                        </tr>
                    </table>
        ";
        $html .= "
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
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
                        $person->first_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->second_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->third_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->last_name
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                        <span  > National ID</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'>  الجنسية</span>
                        <span > Nationality</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>تاريخ الميلاد  </span>
                        <span >Date of Birth</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> مكان الميلاد</span>
                        <span  >Place of Birth</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->national_id
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->nationality
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_of_birth
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_birth
                    </td>
                </tr>

                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 20px;' > التجنيد </span>
                        <span  >conscription</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 2px;'>الحالة الأجتماعية </span>
                        <span >Marital Status</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                        <span style='margin-right: 1px; margin-left: 6px;'> No.of Children</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني   </span>
                        <span >Insurance No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->conscription
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->marital_status
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->Num_of_children
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->insurance_num
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >الوظيفة المطلوبة   </span>
                        <span >Job Required </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 100%; border: 2px solid black;'>
                        $person->job_required
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black; text-align: right; '  colspan='3'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> معلومات إضافية </span>
                        <span style='font-weight: bold;'> Additional Information </span>
                    </td>
                </tr>

                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                        <span  >Tel.No.</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                        <span >Tel.No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_1
                    </td>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_2
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                        <span >Governorate</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                        <span  >Centre / City</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>محل السكن</span>
                        <span >Place of Residence </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->governorate
                        </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->centre
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_residence
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                        $person->employ_email
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > Email Address  </span>
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 30px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> المؤهلات الدراسي </span>
                        <span style='font-weight: bold;'> Educational Qualifications </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> المؤهل الدراسي </span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_1
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الدراسة العليا</span>
                        <span style='font-weight: bold;'> Postgraduate Studies </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> الدراسة العليا</span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_2
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_2
                    </td>
                </tr>
            </table>

            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                        <span style='font-weight: bold;'> Training courses </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >  اسم الدورة </span>
                        <span  >Course</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > المده </span>
                        <span >Duration</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > تاريخها</span>
                        <span >Date</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >الجهة الدورة</span>
                        <span > sponsor </span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >مكانها</span>
                        <span >Location</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_4
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_5
                    </td>
                </tr>
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
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_4
                    </td>
                </tr>
            </table>
        ";
        $html .="
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                    </td>
                    <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                        $person->last_sallary
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
                        $person->skills_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_4
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
        ";
        if($person->arabic_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        $html .="
                <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                    <span style='font-weight: bold;'> arabic </span>
                </td>
            </tr>
            <tr>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                    <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                </td>
        ";

        if($person->english_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }
        $html .="
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
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_2
                    </td>
        ";
        $html .="
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
                                $person->person_name_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_1
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_name_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_2
                            </td>
                        </tr>
                    </table>
                    <h4 style='width: 100%; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
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
                                <img src='$userimagePath' alt='Image' style='width: 270px; height: 320x; margin-bottom: -70px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 60px 20px 30px;'>
                                <img src='$frontimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -20px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 40px 20px 10px;'>
                                <img src='$backimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        return SnappyPdf::loadHTML($html, [
            'enable-local-file-access' => true,
            'encoding' => 'UTF-8',
            'page-size' => 'A4',
        ])->inline($request->name .'.pdf');
    }
    public function del_appointedPDF(Request $request)
    {
        $id = $request->person_id;
        $person = delete_appointed_model::find($id,['*']);

        $frontPath = str_replace('\\', '/', public_path("storage/" . $person->frontOFcard_up));
        $backPath = str_replace('\\', '/', public_path("storage/" . $person->backOFcard_up));
        $userphoto = str_replace('\\', '/', public_path("storage/" . $person->photoOFuser_up));

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
            $frontimagePath = 'file:///' . $frontPath;
            $backimagePath = 'file:///' . $backPath;
            $userimagePath = 'file:///' . $userphoto;
            $fontPath = 'file:///' . str_replace('\\', '/', public_path('fonts/Cairo-Regular.ttf'));
        } else {
            $imgPath = asset('img/Roaya.png');
            $frontimagePath = asset($frontPath);
            $backimagePath = asset($backPath);
            $userimagePath = asset($userphoto);
            $fontPath = asset('fonts/Cairo-Regular.ttf');
        }

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
        } else {
            $imgPath = asset('img/Roaya.png');
        }

        // $id = $request->person_id;
        $html = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Print CV</title>
                    <style>
                        @font-face {
                            font-family: "Cairo";
                            src: url("'. $fontPath .'");
                        }

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
        ';
        $html .= "
                                <img src='$imgPath' style='width: 90%;'/>
                            </td>
                            <td style='width: 33%; border: 2px solid black;'>
                                <div style='font-weight: bold;'>Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style='margin-top: 10px;'>Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: center;padding: 1px 0;'  colspan='3'>
                                <span style='font-weight: bold;color:#005db4;'> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات شخصية </span>
                                <span style='font-weight: bold;'> Personal Information </span>
                            </td>
                        </tr>
                    </table>
        ";
        $html .= "
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
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
                        $person->first_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->second_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->third_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->last_name
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                        <span  > National ID</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'>  الجنسية</span>
                        <span > Nationality</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>تاريخ الميلاد  </span>
                        <span >Date of Birth</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> مكان الميلاد</span>
                        <span  >Place of Birth</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->national_id
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->nationality
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_of_birth
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_birth
                    </td>
                </tr>

                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 20px;' > التجنيد </span>
                        <span  >conscription</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 2px;'>الحالة الأجتماعية </span>
                        <span >Marital Status</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                        <span style='margin-right: 1px; margin-left: 6px;'> No.of Children</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني   </span>
                        <span >Insurance No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->conscription
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->marital_status
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->Num_of_children
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->insurance_num
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >الوظيفة المطلوبة   </span>
                        <span >Job Required </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 100%; border: 2px solid black;'>
                        $person->job_required
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black; text-align: right; '  colspan='3'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> معلومات إضافية </span>
                        <span style='font-weight: bold;'> Additional Information </span>
                    </td>
                </tr>

                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                        <span  >Tel.No.</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                        <span >Tel.No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_1
                    </td>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_2
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                        <span >Governorate</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                        <span  >Centre / City</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>محل السكن</span>
                        <span >Place of Residence </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->governorate
                        </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->centre
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_residence
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                        $person->employ_email
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > Email Address  </span>
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 30px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> المؤهلات الدراسي </span>
                        <span style='font-weight: bold;'> Educational Qualifications </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> المؤهل الدراسي </span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_1
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الدراسة العليا</span>
                        <span style='font-weight: bold;'> Postgraduate Studies </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> الدراسة العليا</span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_2
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_2
                    </td>
                </tr>
            </table>

            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                        <span style='font-weight: bold;'> Training courses </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >  اسم الدورة </span>
                        <span  >Course</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > المده </span>
                        <span >Duration</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > تاريخها</span>
                        <span >Date</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >الجهة الدورة</span>
                        <span > sponsor </span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >مكانها</span>
                        <span >Location</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_4
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_5
                    </td>
                </tr>
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
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_4
                    </td>
                </tr>
            </table>
        ";
        $html .="
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                    </td>
                    <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                        $person->last_sallary
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
                        $person->skills_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_4
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
        ";
        if($person->arabic_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        $html .="
                <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                    <span style='font-weight: bold;'> arabic </span>
                </td>
            </tr>
            <tr>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                    <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                </td>
        ";

        if($person->english_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }
        $html .="
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
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_2
                    </td>
        ";
        $html .="
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
                                $person->person_name_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_1
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_name_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_2
                            </td>
                        </tr>
                    </table>
                    <h4 style='width: 100%; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
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
                                <img src='$userimagePath' alt='Image' style='width: 270px; height: 320x; margin-bottom: -70px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 60px 20px 30px;'>
                                <img src='$frontimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -20px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 40px 20px 10px;'>
                                <img src='$backimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        return SnappyPdf::loadHTML($html, [
            'enable-local-file-access' => true,
            'encoding' => 'UTF-8',
            'page-size' => 'A4',
        ])->inline($request->name .'.pdf');
    }
    public function del_postponePDF(Request $request)
    {
        $id = $request->person_id;
        $person = delete_postpone_model::find($id,['*']);

        $frontPath = str_replace('\\', '/', public_path("storage/" . $person->frontOFcard_up));
        $backPath = str_replace('\\', '/', public_path("storage/" . $person->backOFcard_up));
        $userphoto = str_replace('\\', '/', public_path("storage/" . $person->photoOFuser_up));

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
            $frontimagePath = 'file:///' . $frontPath;
            $backimagePath = 'file:///' . $backPath;
            $userimagePath = 'file:///' . $userphoto;
            $fontPath = 'file:///' . str_replace('\\', '/', public_path('fonts/Cairo-Regular.ttf'));
        } else {
            $imgPath = asset('img/Roaya.png');
            $frontimagePath = asset($frontPath);
            $backimagePath = asset($backPath);
            $userimagePath = asset($userphoto);
            $fontPath = asset('fonts/Cairo-Regular.ttf');
        }

        if (app()->environment('local')) {
            $imgPath = 'file:///' . str_replace('\\', '/', public_path('img/Roaya.png'));
        } else {
            $imgPath = asset('img/Roaya.png');
        }

        // $id = $request->person_id;
        $html = '
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Print CV</title>
                    <style>
                        @font-face {
                            font-family: "Cairo";
                            src: url("'. $fontPath .'");
                        }

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
        ';
        $html .= "
                                <img src='$imgPath' style='width: 90%;'/>
                            </td>
                            <td style='width: 33%; border: 2px solid black;'>
                                <div style='font-weight: bold;'>Roaya Pay for Payment Solutions<br>and Software</div>
                                <div style='margin-top: 10px;'>Human Resources Management</div>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: center;padding: 1px 0;'  colspan='3'>
                                <span style='font-weight: bold;color:#005db4;'> طلب توظيف في شركة رؤية باي لحلول السداد و البرمجيات </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='3'>
                                <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> معلومات شخصية </span>
                                <span style='font-weight: bold;'> Personal Information </span>
                            </td>
                        </tr>
                    </table>
        ";
        $html .= "
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
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
                        $person->first_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->second_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->third_name
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->last_name
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الرقم القومي</span>
                        <span  > National ID</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'>  الجنسية</span>
                        <span > Nationality</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>تاريخ الميلاد  </span>
                        <span >Date of Birth</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> مكان الميلاد</span>
                        <span  >Place of Birth</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->national_id
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->nationality
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_of_birth
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_birth
                    </td>
                </tr>

                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 20px;' > التجنيد </span>
                        <span  >conscription</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 2px;'>الحالة الأجتماعية </span>
                        <span >Marital Status</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> عدد الأبناء</span>
                        <span style='margin-right: 1px; margin-left: 6px;'> No.of Children</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'> الرقم التأميني   </span>
                        <span >Insurance No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->conscription
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->marital_status
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->Num_of_children
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->insurance_num
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black;background-color: #ddd;'colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >الوظيفة المطلوبة   </span>
                        <span >Job Required </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 100%; border: 2px solid black;'>
                        $person->job_required
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 100%; border: 2px solid black; text-align: right; '  colspan='3'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> معلومات إضافية </span>
                        <span style='font-weight: bold;'> Additional Information </span>
                    </td>
                </tr>

                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > الهاتف </span>
                        <span  >Tel.No.</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> الهاتف </span>
                        <span >Tel.No.</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_1
                    </td>
                    <td style='width: 50%; border: 2px solid black;'>
                        $person->number_tel_2
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;'> المحاظة </span>
                        <span >Governorate</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > مركز / الحي </span>
                        <span  >Centre / City</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 1px; margin-left: 6px;'>محل السكن</span>
                        <span >Place of Residence </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->governorate
                        </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->centre
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->place_of_residence
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > البريد الألكتروني </span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;color: #f00; font-size: 20px;' colspan='2'>
                        $person->employ_email
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd;'>
                        <span style='margin-right: 5px; margin-left: 30px;' > Email Address  </span>
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 30px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 450px;'> المؤهلات الدراسي </span>
                        <span style='font-weight: bold;'> Educational Qualifications </span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> المؤهل الدراسي </span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 30px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_1
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_1
                    </td>
                </tr>
            </table>
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='6'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'> الدراسة العليا</span>
                        <span style='font-weight: bold;'> Postgraduate Studies </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> الدراسة العليا</span>
                        <span  >Educational Qualification</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> التخصص العلمي  </span>
                        <span >Scientific Specialization</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->academic_qualification_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->scientific_specialization_2
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> سنة التخرج </span>
                        <span >Year Graduated</span>
                    </td>
                    <td style='width: 50%; border: 2px solid black;background-color: #ddd; line-height: 25px;'>
                        <span style='margin-left: 70px; '> جهة المؤهل </span>
                        <span >Qualification authority</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->year_graduated_2
                    </td>
                    <td style='width: 50%; border: 2px solid black; line-height: 30px;'>
                        $person->university_2
                    </td>
                </tr>
            </table>

            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr style='line-height: 25px'>
                    <td style='width: 33%; border: 2px solid black; text-align: right; ' colspan='5'>
                        <span style='font-weight: bold; margin-right: 25px; margin-left: 550px;'>  الدورات التدريبية </span>
                        <span style='font-weight: bold;'> Training courses </span>
                    </td>
                </tr>
                <tr class='row' style='line-height: 25px'>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >  اسم الدورة </span>
                        <span  >Course</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > المده </span>
                        <span >Duration</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span > تاريخها</span>
                        <span >Date</span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >الجهة الدورة</span>
                        <span > sponsor </span>
                    </td>
                    <td style='width: 25%; border: 2px solid black;background-color: #ddd; line-height: 15px;'>
                        <span >مكانها</span>
                        <span >Location</span>
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_4
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_name_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->duration_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->sponsor_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_date_5
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->course_location_5
                    </td>
                </tr>
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
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_1
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_2
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_3
                    </td>
                </tr>
                <tr class='row'>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->employer_name_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->positica_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_from_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->date_to_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->basic_salary_4
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->reason_for_leaving_4
                    </td>
                </tr>
            </table>
        ";
        $html .="
            <table style='width: 100%; border: 2px solid black; border-collapse: collapse; text-align: center;'>
                <tr class='row'>
                    <td style='width: 33%; border: 2px solid black;background-color: #ddd;' colspan='2'>
                        <span style='margin-right: 5px; margin-left: 30px;' >  إجمالي الدخل الشهري لأخر وظيفة  </span>
                    </td>
                    <td style='width: 33%; border: 2px solid black;color: #5baa59; font-size: 20px;' colspan='1'>
                        $person->last_sallary
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
                        $person->skills_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_2
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_3
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->skills_4
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
        ";
        if($person->arabic_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->arabic_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->arabic_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        $html .="
                <td style='width: ; border: 2px solid black; text-align: center; ' colspan='2'>
                    <span style='font-weight: bold;'> arabic </span>
                </td>
            </tr>
            <tr>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;' colspan='2'>
                    <span style='font-weight: bold;'> اللغة الأنجليزية</span>
                </td>
        ";

        if($person->english_reading == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_reading == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_writing == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_writing == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }

        if($person->english_speaking == 'جيد'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'متوسط'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
            ";
        }else if($person->english_speaking == 'ضعيف'){
            $html .="
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' />
                </td>
                <td style='width: ; border: 2px solid black; text-align: center; line-height: 10px;'>
                    <input type='checkbox' checked/>
                </td>
            ";
        }
        $html .="
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
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_1
                    </td>
                    <td style='width: 25%; border: 2px solid black;'>
                        $person->hobbies_2
                    </td>
        ";
        $html .="
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
                                $person->person_name_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_1
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_1
                            </td>
                        </tr>
                        <tr>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_name_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_relationship_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_phone_2
                            </td>
                            <td style='width: 25%; border: 2px solid black;'>
                                $person->person_address_2
                            </td>
                        </tr>
                    </table>
                    <h4 style='width: 100%; margin-right: 20px; color: #005db4; border-bottom: 1px solid #005db4;'>اتقدم اليكم ادارة شركة رؤية باى لحلول السداد و البرمجيات بطلب الانضمام للوظيفة الشاغلة.</h4>
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
                                <img src='$userimagePath' alt='Image' style='width: 270px; height: 320x; margin-bottom: -70px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / امام </p>
                                <p> front image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 60px 20px 30px;'>
                                <img src='$frontimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -20px'/>
                            </td>
                        </tr>
                        <tr>
                            <td style='border: 2px solid black;'>
                                <p> صورة البطاقة / خلف </p>
                                <p> back image </p>
                            </td>
                            <td style='border: 2px solid black; padding: 40px 20px 10px;'>
                                <img src='$backimagePath' alt='Image' style='width: 550px; height: 300px; margin-bottom: -50px'/>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        return SnappyPdf::loadHTML($html, [
            'enable-local-file-access' => true,
            'encoding' => 'UTF-8',
            'page-size' => 'A4',
        ])->inline($request->name .'.pdf');
    }

}
