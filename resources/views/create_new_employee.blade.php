<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link -->
    <link rel='icon' href="{{ secure_asset('img/Roaya_icon.png') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" />
    <!-- style -->
    <style>
        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 1;
            cursor: pointer;
        }
    </style>
    <!-- title -->
    <title>شركة رؤية باي &nbsp;&nbsp;|&nbsp;&nbsp; إستمارة تقديم</title>
</head>

<body>
    <button class="btnup d-none">
        <svg class="svg-inline--fa fa-angle-up" aria-hidden="true" focusable="false" data-prefix="fas"
            data-icon="angle-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
            <path fill="currentColor"
                d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z">
            </path>
        </svg>
    </button>
    <header>
        <img src="img/Roaya.png" alt="" draggable="false">
        <h3>استمارة طلب وظيفة</h3>
    </header>
    <div class="container">
        <form action="{{ route('store_new_employee') }}" method="POST" enctype="multipart/form-data" class="was-validated">
            @csrf
            <div class="alert alert-info mt-3 text-right" role="alert">
                الحقول التى تمتلك علامة (<span class="text-danger">*</span>)  مطلوبة إجبارياً , و الحقول التى لا تمتك علامة يجب ملأها إن وجدت .
            </div>
            <div class="employee" id='employee_specific'>
                <span> المعلومات الشخصية</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field names_group col-6 col-xl-3  col-sm-3">
                            <label for="first_name">
                                 الاســم الأول
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="first_name" name="first_name" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field names_group col-6 col-xl-3  col-sm-3">
                            <label for="father_name">
                                 اسم الأب
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="father_name" name="second_name" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field names_group col-6 col-xl-3  col-sm-3">
                            <label for="grandpa_name">
                                 اسم الجد
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="grandpa_name" name="third_name" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field names_group col-6 col-xl-3  col-sm-3">
                            <label for="family_name">
                                 اسم العائلة
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="family_name" name="last_name" class="form-control is-invalid" placeholder="" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <input type="hidden" id="nationality" name="nationality" value="مصــري" class="form-control is-invalid" placeholder="" required>
                        <div class="field col-6 col-xl-3 col-md-3">
                            <label for="national_id">
                                 الرقم القومي
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="national_id" name="national_id" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-6 col-xl-3 col-md-3">
                            <label for="date_of_birth">
                                 تاريخ الميلاد
                                <span class="text-danger">*</span>
                            </label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control is-invalid" inputmode="none" required />
                        </div>
                        <div class="field col-6 col-xl-3 col-md-3">
                            <label for="place_of_birth">
                                 مكان الميلاد
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="place_of_birth" name="place_of_birth" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-6 col-xl-3 col-md-3">
                            <label for="insurance_num"> الرقم التأميني </label>
                            <input type="text" id="insurance_num" name="insurance_num" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-4 col-md-4">
                            <label for="conscription">
                                المــوقف مــن التجــنيد
                                <span class="text-danger">*</span>
                            </label>
                            <select class="custom-select is-invalid" id="conscription" name="conscription" aria-describedby="validationServer04Feedback" required>
                                <option selected disabled value="">-</option>
                                <option value="تــم تأديــة الخــدمـة">تــم تأديــة الخــدمـة</option>
                                <option value="إعفــاء">إعفــاء</option>
                            </select>
                        </div>
                        <div class="field col-6 col-xl-4 col-md-4">
                            <label for="marital_status">
                                الحالة الأجتماعية
                                <span class="text-danger">*</span>
                            </label>
                            <select class="custom-select is-invalid" id="marital_status" name="marital_status" aria-describedby="validationServer04Feedback" required>
                                <option selected disabled value="">-</option>
                                <option value="اعزب"> اعزب </option>
                                <option value="متزوج">متزوج</option>
                            </select>
                        </div>
                        <div class="field col-6 col-xl-4 col-md-4 child">
                            <label for="number_of_children">
                                    عدد الأبناء
                                    <span class="text-danger">*</span>
                                </label>
                            <input type="text" id="number_of_children" name="number_of_children" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="job_required">
                                الوظيــفة المطــلوبة
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="job_required" name="job_required" class="job_required form-control is-invalid" placeholder="" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div id="img1">
                            <div class="custom-file field">
                                <input type="file" accept=" .jpg , .jpeg , .png" class="custom-file-input" id="frontOFcard" name="frontOFcard" placeholder="" required>
                                <label for="frontOFcard" class="custom-file-label text-left">
                                    رفــع صـورة البطـاقــة / امــام
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="invalid-feedback">يجب ارفاق الملف المطلوب</div>
                                <img id="frontOFcard_view" src="#" alt="معاينة الصورة" style="max-width: 100%; display: none; height: 198px; margin: 0 auto;" />
                            </div>
                            <div class="custom-file field">
                                <input type="file" accept=" .jpg , .jpeg , .png" class="custom-file-input" id="backOFcard" name="backOFcard" placeholder="" required>
                                <label for="backOFcard" class="custom-file-label text-left">
                                    رفــع صـورة البطـاقــة / خلــف
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="invalid-feedback">يجب ارفاق الملف المطلوب</div>
                                <img id="backOFcard_view" src="#" alt="معاينة الصورة" style="max-width: 100%; display: none; height: 198px; margin: 0 auto;" />
                            </div>
                        </div>
                        <div class="custom-file field">
                            <input type="file" accept=" .jpg , .jpeg , .png" class="custom-file-input" id="photoOFuser" name="photoOFuser" placeholder="" required>
                            <label for="photoOFuser" class="custom-file-label text-left">
                                رفــع صــورة شخــصيـة
                                <span class="text-danger">*</span>
                            </label>
                            <div class="invalid-feedback">يجب ارفاق الملف المطلوب</div>
                            <img id="photoOFuser_view" src="#" alt="معاينة الصورة" style="max-width: 100%; display: none; height: 198px; margin: 0 auto;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="employee" id="educational">
                <span> المعلومات الأضافية</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-6">
                            <label for="numberOFphone_1">
                                رقــم الهــاتـف 1
                                <span class="text-danger">*</span>
                            </label>
                            <input type="tel" maxlength="11" id="numberOFphone_1" name="numberOFphone_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-6">
                            <label for="numberOFphone_2">رقــم الهــاتـف 2 </label>
                            <input type="tel" maxlength="11" id="numberOFphone_2" name="numberOFphone_2" class="form-control is-invalid" placeholder="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="email">
                                البريد الإلكتروني
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="mail" name="useremail" class="form-control is-invalid" placeholder="" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="field col-4">
                            <label for="governorateSelect">
                                اختر محافظة
                                <span class="text-danger">*</span>
                            </label>
                            <select type="text" id="governorateSelect" name="governorateSelect" class="custom-select is-invalid" placeholder="" aria-describedby="validationServer04Feedback" onchange="updateCenters()" required>
                            </select>
                        </div>
                        <div class="field col-4">
                            <label for="centerSelect">
                                 مركز / حي
                                    <span class="text-danger">*</span>
                                </label>
                            <select type="text" id="centerSelect" name="centerSelect" class="custom-select is-invalid" placeholder="" required></select>
                        </div>
                        <div class="field col-4">
                            <label for="address">
                                محل السكن
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="address" name="address" class="form-control is-invalid" placeholder="" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee" id="qualification_1">
                <span> المؤهل الدراسي </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="academic_qualification_1">
                                المؤهل الدراسي
                                <span class="text-danger">*</span>
                            </label>
                            <select type="text" id="academic_qualification_1" name="academic_qualification_1" class="custom-select is-invalid" placeholder="" required>
                                <option selected disabled value="">-</option>
                                <option value="بكالوريوس">بكالوريوس</option>
                                <option value="ليسانس">ليسانس</option>
                                <option value="مؤهل فوق المتوسط">مؤهل فوق المتوسط</option>
                                <option value="مؤهل متوسط">مؤهل متوسط</option>
                            </select>
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="scientific_specialization_1">
                                التخصص العلمي
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="scientific_specialization_1" name="scientific_specialization_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="year_graduated_1">
                                سنة التخرج
                                <span class="text-danger">*</span>
                            </label>
                            <select type="text" id="year_graduated_1" name="year_graduated_1" class="custom-select is-invalid" placeholder="" required>
                                <option selected disabled value="">-</option>
                                @for ($year = 1980; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="university_1">
                                جهة المؤهل
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="university_1" name="university_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_qualification w-75" type="button" id="add_qualification_2" onclick="addQualification_2()">
                        اضافة دراسات عليا
                    </button>
                </div>
            </div>
            <div class="employee" id="qualification_2">
                <span> دراسات عليا </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="academic_qualification_2">
                                الدراسة العليا
                            </label>
                            <select type="text" id="academic_qualification_2" name="academic_qualification_2" class="custom-select is-invalid" placeholder="" >
                                <option selected disabled value="-">-</option>
                                <option value="دكتوراة">دكتوراة</option>
                                <option value="ماجستير">ماجستير</option>
                            </select>
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="scientific_specialization_2">
                                التخصص العلمي
                            </label>
                            <input type="text" id="scientific_specialization_2" name="scientific_specialization_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="year_graduated_2">
                                سنة التخرج
                            </label>
                            <select type="text" id="year_graduated_2" name="year_graduated_2" class="custom-select is-invalid" placeholder="" >
                                <option selected disabled value="">-</option>
                                @for ($year = 1980; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6">
                            <label for="university_2">
                                جهة المؤهل
                            </label>
                            <input type="text" id="university_2" name="university_2" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee" id="course_1">
                <span> الدورة التدريبية الأولى </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="course_name_1"> اسم الدورة </label>
                            <input type="text" id="course_name_1" name="course_name_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="duration_1">المدة </label>
                            <input type="text" id="duration_1" name="duration_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="date_1">تاريخها </label>
                            <input type="date" id="date_1" name="date_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="sponsor_1">جهة الدورة </label>
                            <input type="text" id="sponsor_1" name="sponsor_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="location_1">مكانها </label>
                            <input type="text" id="location_1" name="location_1" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_qualification w-75" type="button" id="training_courses_1" onclick="add_course_2()">
                         دورة تدريبية اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="course_2">
                <span>  الدورة التدريبية الثانية </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="course_name_2"> اسم الدورة </label>
                            <input type="text" id="course_name_2" name="course_name_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="duration_2">المدة </label>
                            <input type="text" id="duration_2" name="duration_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="date_2">تاريخها </label>
                            <input type="date" id="date_2" name="date_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="sponsor_2">جهة الدورة </label>
                            <input type="text" id="sponsor_2" name="sponsor_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="location_2">مكانها </label>
                            <input type="text" id="location_2" name="location_2" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_qualification w-75" type="button" id="training_courses_2" onclick="add_course_3()">
                         دورة تدريبية اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="course_3">
                <span>  الدورة التدريبية الثالثة </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="course_name_3"> اسم الدورة </label>
                            <input type="text" id="course_name_3" name="course_name_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="duration_3">المدة </label>
                            <input type="text" id="duration_3" name="duration_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="date_3">تاريخها </label>
                            <input type="date" id="date_3" name="date_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="sponsor_3">جهة الدورة </label>
                            <input type="text" id="sponsor_3" name="sponsor_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="location_3">مكانها </label>
                            <input type="text" id="location_3" name="location_3" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_qualification w-75" type="button" id="training_courses_3" onclick="add_course_4()">
                         دورة تدريبية اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="course_4">
                <span>  الدورة التدريبية الرابعة </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="course_name_4"> اسم الدورة </label>
                            <input type="text" id="course_name_4" name="course_name_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="duration_4">المدة </label>
                            <input type="text" id="duration_4" name="duration_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="date_4">تاريخها </label>
                            <input type="date" id="date_4" name="date_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="sponsor_4">جهة الدورة </label>
                            <input type="text" id="sponsor_4" name="sponsor_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="location_4">مكانها </label>
                            <input type="text" id="location_4" name="location_4" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_qualification w-75" type="button" id="training_courses_4" onclick="add_course_5()">
                         دورة تدريبية اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="course_5">
                <span> الدورة التدريبية الخامسة</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12">
                            <label for="course_name_5"> اسم الدورة </label>
                            <input type="text" id="course_name_5" name="course_name_5" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="duration_5">المدة </label>
                            <input type="text" id="duration_5" name="duration_5" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="date_5">تاريخها </label>
                            <input type="date" id="date_5" name="date_5" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="sponsor_5">جهة الدورة </label>
                            <input type="text" id="sponsor_5" name="sponsor_5" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="location_5">مكانها </label>
                            <input type="text" id="location_5" name="location_5" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee" id="last_jobs_1">
                <span>  الوظيفة الأولى</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-6 ">
                            <label for="positica_1"> الوظيفة </label>
                            <input type="text" id="positica_1" name="positica_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="employer_name_1"> اسم الجهة</label>
                            <input type="text" id="employer_name_1" name="employer_name_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_from_1">التاريخ من </label>
                            <input type="date" id="date_from_1" name="date_from_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_to_1"> التاريخ الي </label>
                            <input type="date" id="date_to_1" name="date_to_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="basic_salary_1"> الراتب الاساسي </label>
                            <input type="text" id="basic_salary_1" name="basic_salary_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="reasons_for_leaving_1"> سبب ترك الوظيفة </label>
                            <input type="text" id="reasons_for_leaving_1" name="reasons_for_leaving_1" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_last_jobs w-75" type="button" id="add_last_jobs_2" onclick="addlastjobs_2()">
                        إضافة وظيفة اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="last_jobs_2">
                <span>  الوظيفة الثانية</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-6 ">
                            <label for="positica_2"> الوظيفة </label>
                            <input type="text" id="positica_2" name="positica_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="employer_name_2"> اسم الجهة</label>
                            <input type="text" id="employer_name_2" name="employer_name_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_from_2">التاريخ من </label>
                            <input type="date" id="date_from_2" name="date_from_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_to_2"> التاريخ الي </label>
                            <input type="date" id="date_to_2" name="date_to_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="basic_salary_2"> الراتب الاساسي </label>
                            <input type="text" id="basic_salary_2" name="basic_salary_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="reasons_for_leaving_2"> سبب ترك الوظيفة </label>
                            <input type="text" id="reasons_for_leaving_2" name="reasons_for_leaving_2" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_last_jobs w-75" type="button" id="add_last_jobs_3" onclick="addlastjobs_3()">
                        إضافة وظيفة اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="last_jobs_3">
                <span>  الوظيفة الثالثة</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-6 ">
                            <label for="positica_3"> الوظيفة </label>
                            <input type="text" id="positica_3" name="positica_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="employer_name_3"> اسم الجهة</label>
                            <input type="text" id="employer_name_3" name="employer_name_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_from_3">التاريخ من </label>
                            <input type="date" id="date_from_3" name="date_from_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_to_3"> التاريخ الي </label>
                            <input type="date" id="date_to_3" name="date_to_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="basic_salary_3"> الراتب الاساسي </label>
                            <input type="text" id="basic_salary_3" name="basic_salary_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="reasons_for_leaving_3"> سبب ترك الوظيفة </label>
                            <input type="text" id="reasons_for_leaving_3" name="reasons_for_leaving_3" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="addtion">
                    <button class="btn btn-secondary add_last_jobs w-75" type="button" id="add_last_jobs_4" onclick="addlastjobs_4()">
                          إضافة وظيفة اخرى
                    </button>
                </div>
            </div>
            <div class="employee" id="last_jobs_4">
                <span>  الوظيفة الرابعة</span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-6 ">
                            <label for="positica_4"> الوظيفة </label>
                            <input type="text" id="positica_4" name="positica_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6 ">
                            <label for="employer_name_4"> اسم الجهة</label>
                            <input type="text" id="employer_name_4" name="employer_name_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_from_4">التاريخ من </label>
                            <input type="date" id="date_from_4" name="date_from_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="date_to_4"> التاريخ الي </label>
                            <input type="date" id="date_to_4" name="date_to_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="basic_salary_4"> الراتب الاساسي </label>
                            <input type="text" id="basic_salary_4" name="basic_salary_4" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-6">
                            <label for="reasons_for_leaving_4"> سبب ترك الوظيفة </label>
                            <input type="text" id="reasons_for_leaving_4" name="reasons_for_leaving_4" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee">
                <span> إجمالي الدخل الشهري لأخر وظيفة</span>
                <div class="fields w-100">
                    <div class="field w-100">
                        <label for="last_sallary">الراتب الأخير</label>
                        <input type="number" id="last_sallary" name="last_sallary" class="form-control is-invalid" placeholder="" >
                    </div>
                </div>
            </div>

            <div class="employee" id="skills">
                <span> المهارات </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-3 col-md-6">
                            <label for="skills_1">1 مهارة</label>
                            <input type="text" id="skills_1" name="skills_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-xl-3 col-md-6">
                            <label for="skills_2">2 مهارة</label>
                            <input type="text" id="skills_2" name="skills_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-xl-3 col-md-6">
                            <label for="skills_3">3 مهارة</label>
                            <input type="text" id="skills_3" name="skills_3" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-xl-3 col-md-6">
                            <label for="skills_4">4 مهارة</label>
                            <input type="text" id="skills_4" name="skills_4" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee" id="arabic">
                <span> اللغة العربية </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-4 col-md-4 col-sm-4">
                            <label for="arabic_reading"> القراءة
                                <span class="text-danger">*</span>
                            </label>
                            <select id="arabic_reading" name="arabic_reading" class="custom-select is-invalid" required>
                                <option disabled selected value="">-</option>
                                <option value="جيد">جيد</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ضعيف">ضعيف</option>
                            </select>
                        </div>
                        <div class="field col-12 col-xl-4 col-md-4 col-sm-4">
                            <label for="arabic_writing"> الكتابة
                                <span class="text-danger">*</span>
                            </label>
                            <select id="arabic_writing" name="arabic_writing" class="custom-select is-invalid" required>
                                <option disabled selected value="">-</option>
                                <option value="جيد">جيد</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ضعيف">ضعيف</option>
                            </select>
                        </div>
                        <div class="field col-12 col-xl-4 col-md-4 col-sm-4">
                            <label for="arabic_speaking"> التحدث
                                <span class="text-danger">*</span>
                            </label>
                            <select id="arabic_speaking" name="arabic_speaking" class="custom-select is-invalid" required>
                                <option disabled selected value="">-</option>
                                <option value="جيد">جيد</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ضعيف">ضعيف</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="employee" id="english">
                <span> اللغة الأنجليزية </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-4 col-md-4 col-sm-4">
                            <label for="english_reading"> القراءة
                                <span class="text-danger">*</span>
                            </label>
                            <select id="english_reading" name="english_reading" class="custom-select is-invalid" required>
                                <option disabled selected value="">-</option>
                                <option value="جيد">جيد</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ضعيف">ضعيف</option>
                            </select>
                        </div>
                        <div class="field col-12 col-xl-4 col-md-4 col-sm-4">
                            <label for="english_writing"> الكتابة
                                <span class="text-danger">*</span>
                            </label>
                            <select id="english_writing" name="english_writing" class="custom-select is-invalid" required>
                                <option disabled selected value="">-</option>
                                <option value="جيد">جيد</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ضعيف">ضعيف</option>
                            </select>
                        </div>
                        <div class="field col-12 col-xl-4 col-md-4 col-sm-4">
                            <label for="english_speaking"> التحدث
                                <span class="text-danger">*</span>
                            </label>
                            <select id="english_speaking" name="english_speaking" class="custom-select is-invalid" required>
                                <option disabled selected value="">-</option>
                                <option value="جيد">جيد</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ضعيف">ضعيف</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee" id="hobbies">
                <span> الهوايات </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-xl-6 col-md-6 col-sm-6">
                            <label for="hobbies_1">1 الهواية</label>
                            <input type="text" id="hobbies_1" name="hobbies_1" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-xl-6 col-md-6 col-sm-6">
                            <label for="hobbies_2">2 الهواية</label>
                            <input type="text" id="hobbies_2" name="hobbies_2" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="employee" id="person_1">
                <span> اشخاص  بأمكاننا الأتصال بهم وقت الضرورة </span>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_name_1">الأول اسم الشخص
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="person_name_1" name="person_name_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_relationship_1"> صلة القرابه
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="person_relationship_1" name="person_relationship_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_phone_1"> رقم الهاتف
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="person_phone_1" name="person_phone_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_address_1"> العنوان
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="person_address_1" name="person_address_1" class="form-control is-invalid" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="row mb-3">
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_name_2">الأول اسم الشخص</label>
                            <input type="text" id="person_name_2" name="person_name_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_relationship_2"> صلة القرابه</label>
                            <input type="text" id="person_relationship_2" name="person_relationship_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_phone_2"> رقم الهاتف</label>
                            <input type="text" id="person_phone_2" name="person_phone_2" class="form-control is-invalid" placeholder="" >
                        </div>
                        <div class="field col-12 col-sm-6 col-xl-6 col-md-6">
                            <label for="person_address_2"> العنوان</label>
                            <input type="text" id="person_address_2" name="person_address_2" class="form-control is-invalid" placeholder="" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="employee employee-btns">
                <div class="btns">
                    <button class="btn btn-success" type="submit" name="submit">ارسال</button>
                    <button class="btn btn-danger" type="reset" name="reset">حذف</button>
                </div>
            </div>
        </form>
    </div>
    <!-- js -->
    <script>
        const data = {
            "القاهرة": ["مدينة نصر", "مصر الجديدة", "المعادي", "حلوان", "شبرا", "الزيتون", "عين شمس", "المرج", "المطرية", "السيدة زينب", "العباسية", "الزمالك", "وسط البلد", "دار السلام", "البساتين", "التجمع الخامس", "التجمع الأول", "التجمع الثالث", "القطامية", "المنيل", "حدائق القبة", "روض الفرج", "عابدين", "باب الشعرية", "بولاق", "الوايلي", "الخليفة", "الموسكي", "الظاهر", "القاهرة الجديدة"],
            "الجيزة": ["الهرم", "الدقي", "العجوزة", "أكتوبر", "الوراق", "البدرشين", "العياط", "الصف", "أطفيح", "الواحات البحرية", "منشأة القناطر", "كرداسة", "أبو النمرس", "الشيخ زايد", "الحوامدية", "المنيب", "بولاق الدكرور", "الطالبية", "الجيزة القديمة"],
            "الإسكندرية": ["المنتزه", "العجمي", "سيدي جابر", "محرم بك", "الجمرك", "الرمل", "برج العرب", "العامرية", "كرموز", "المندرة", "باكوس", "الحضرة", "أبو قير", "سبورتنج", "الشاطبي", "الإبراهيمية", "فيكتوريا", "سموحة", "ميامي", "جليم", "ستانلي", "كامب شيزار", "الأنفوشي", "الورديان"],
            "الدقهلية": ["المنصورة", "ميت غمر", "طلخا", "بلقاس", "السنبلاوين", "دكرنس", "شربين", "أجا", "منية النصر", "بني عبيد", "تمي الأمديد", "الجمالية", "المطرية", "الكردي", "ميت سلسيل", "نبروه"],
            "البحيرة": ["دمنهور", "كفر الدوار", "إيتاي البارود", "أبو حمص", "المحمودية", "رشيد", "إدكو", "حوش عيسى", "الدلنجات", "شبراخيت", "كوم حمادة", "بدر", "وادي النطرون", "النوبارية الجديدة"],
            "الغربية": ["طنطا", "المحلة الكبرى", "زفتى", "كفر الزيات", "السنطة", "قطور", "بسيون", "سمنود"],
            "المنوفية": ["أشمون", "شبين الكوم", "السادات", "منوف", "قويسنا", "الباجور", "تلا", "بركة السبع", "سرس الليان"],
            "الشرقية": ["الزقازيق", "العاشر من رمضان", "فاقوس", "أبو كبير", "بلبيس", "منيا القمح", "ههيا", "الإبراهيمية", "ديرب نجم", "كفر صقر", "أولاد صقر", "الحسينية", "صان الحجر", "القنايات", "مشتول السوق", "القرين"],
            "القليوبية": ["بنها", "شبرا الخيمة", "طوخ", "قليوب", "الخانكة", "القناطر الخيرية", "كفر شكر", "العبور", "الخصوص", "الحي الثاني", "الحي الثالث"],
            "كفر الشيخ": ["كفر الشيخ", "دسوق", "بلطيم", "الحامول", "بيلا", "سيدي سالم", "مطوبس", "فوه", "قلين", "الرياض", "برج البرلس"],
            "دمياط": ["دمياط", "رأس البر", "فارسكور", "الزرقا", "كفر سعد", "كفر البطيخ", "عزبة البرج"],
            "بورسعيد": ["حي الشرق", "حي الضواحي", "حي الزهور", "حي المناخ", "حي العرب", "حي غرب", "بورفؤاد"],
            "الإسماعيلية": ["الإسماعيلية", "فايد", "القنطرة شرق", "القنطرة غرب", "التل الكبير", "أبو صوير", "القصاصين"],
            "السويس": ["حي السويس", "حي الأربعين", "حي عتاقة", "حي الجناين", "حي فيصل"],
            "الفيوم": ["الفيوم", "سنورس", "إطسا", "طامية", "يوسف الصديق", "أبشواي"],
            "بني سويف": ["بني سويف", "الواسطي", "ناصر", "إهناسيا", "ببا", "سمسطا", "الفشن"],
            "المنيا": ["المنيا", "ملوي", "أبو قرقاص", "مطاي", "بني مزار", "سمالوط", "العدوة", "دير مواس", "مغاغة"],
            "أسيوط": ["أسيوط", "ديروط", "منفلوط", "البداري", "صدفا", "الغنايم", "أبو تيج", "ساحل سليم", "الفتح", "أبنوب"],
            "سوهاج": ["سوهاج", "جرجا", "طما", "المراغة", "طهطا", "أخميم", "البلينا", "دار السلام", "المنشأة", "جهينة", "ساقلتة"],
            "قنا": ["قنا", "نجع حمادي", "دشنا", "قوص", "أبوتشت", "فرشوط", "نقادة", "قفط", "الوقف"],
            "الأقصر": ["الأقصر", "القرنة", "إسنا", "أرمنت", "الزينية", "البياضية", "الطود"],
            "أسوان": ["أسوان", "كوم أمبو", "نصر النوبة", "إدفو", "دراو", "كلابشة", "أبو سمبل"],
            "الوادي الجديد": ["الخارجة", "الداخلة", "الفرافرة", "بلاط", "باريس"],
            "مطروح": ["مرسى مطروح", "الحمام", "السلوم", "سيدي براني", "الضبعة", "العلمين", "النجيلة", "فوكة", "سيوة"],
            "شمال سيناء": ["العريش", "الشيخ زويد", "رفح", "بئر العبد", "الحسنة", "نخل"],
            "جنوب سيناء": ["شرم الشيخ", "الطور", "نويبع", "دهب", "سانت كاترين", "رأس سدر", "أبو زنيمة", "أبو رديس"],
            "البحر الأحمر": ["الغردقة", "سفاجا", "القصير", "رأس غارب", "مرسى علم", "الشلاتين", "حلايب"]
        };

        window.onload = function() {
            const governorateSelect = document.getElementById("governorateSelect");
            governorateSelect.innerHTML = '<option selected disabled value="">-</option>';
            for (let gov in data) {
                const option = document.createElement("option");
                option.value = gov;
                option.textContent = gov;
                governorateSelect.appendChild(option);
            }
        };

        function updateCenters() {
        const selectedGov = document.getElementById("governorateSelect").value;
        const centerSelect = document.getElementById("centerSelect");
        centerSelect.innerHTML = '<option selected disabled value="">-</option>';

        if (data[selectedGov]) {
            data[selectedGov].forEach(center => {
                const option = document.createElement("option");
                    option.value = center;
                    option.textContent = center;
                    centerSelect.appendChild(option);
                });
            }
        }

        let marital_status = document.getElementById("marital_status");
        let child = document.querySelector(".child");

        window.addEventListener("load", function() {
            if (marital_status.value === "متزوج") {
                child.style.display = "block";
                child.querySelector("input").disabled = false;
                child.querySelector("input").value = '';
                child.querySelector("input").required = true;
            } else {
                child.querySelector("input").required = false;
                child.querySelector("input").disabled = true;
                child.querySelector("input").value = '0';
                child.querySelector("input").placeholder = "";
            }
        });
        marital_status.addEventListener("change", function() {
            if (this.value === "متزوج") {
                child.style.display = "block";
                child.querySelector("input").disabled = false;
                child.querySelector("input").value = '';
                child.querySelector("input").required = true;
            } else {
                child.querySelector("input").required = false;
                child.querySelector("input").disabled = true;
                child.querySelector("input").value = '0';
                child.querySelector("input").placeholder = "";
            }
        });

        let qualification_2 = document.getElementById("qualification_2");
        window.addEventListener("load", function() {
            qualification_2.style.display = "none";
        });
        function addQualification_2() {
            qualification_2.style.display = "block";
            document.getElementById("add_qualification_2").style.display = "none";
        }

        let course_2 = document.getElementById("course_2");
        let course_3 = document.getElementById("course_3");
        let course_4 = document.getElementById("course_4");
        let course_5 = document.getElementById("course_5");
        window.addEventListener("load", function() {
            course_2.style.display = "none";
            course_3.style.display = "none";
            course_4.style.display = "none";
            course_5.style.display = "none";
        });
        function add_course_2() {
            course_2.style.display = "block";
            document.getElementById("training_courses_1").style.display = "none";
        }
        function add_course_3() {
            course_3.style.display = "block";
            document.getElementById("training_courses_2").style.display = "none";
        }
        function add_course_4() {
            course_4.style.display = "block";
            document.getElementById("training_courses_3").style.display = "none";
        }
        function add_course_5() {
            course_5.style.display = "block";
            document.getElementById("training_courses_4").style.display = "none";
        }
        let last_jobs_1 = document.getElementById("last_jobs_1");
        let last_jobs_2 = document.getElementById("last_jobs_2");
        let last_jobs_3 = document.getElementById("last_jobs_3");
        let last_jobs_4 = document.getElementById("last_jobs_4");
        window.addEventListener("load", function() {
            last_jobs_2.style.display = "none";
            last_jobs_3.style.display = "none";
            last_jobs_4.style.display = "none";
        });
        function addlastjobs_2() {
            last_jobs_2.style.display = "block";
            document.getElementById("add_last_jobs_2").style.display = "none";
        }
        function addlastjobs_3() {
            last_jobs_3.style.display = "block";
            document.getElementById("add_last_jobs_3").style.display = "none";
        }
        function addlastjobs_4() {
            last_jobs_4.style.display = "block";
            document.getElementById("add_last_jobs_4").style.display = "none";
        }
    </script>
    <script>
        const frontOFcard = document.getElementById("frontOFcard");
        const frontOFcard_view = document.getElementById("frontOFcard_view");

        frontOFcard.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                frontOFcard_view.src = URL.createObjectURL(file);
                frontOFcard_view.style.display = "block";
            } else {
                frontOFcard_view.src = "";
                frontOFcard_view.style.display = "none";
            }
        });
    </script>
    <script>
        const backOFcard = document.getElementById("backOFcard");
        const backOFcard_view = document.getElementById("backOFcard_view");

        backOFcard.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                backOFcard_view.src = URL.createObjectURL(file);
                backOFcard_view.style.display = "block";
            } else {
                backOFcard_view.src = "";
                backOFcard_view.style.display = "none";
            }
        });
    </script>
    <script>
        const photoOFuser = document.getElementById("photoOFuser");
        const photoOFuser_view = document.getElementById("photoOFuser_view");

        photoOFuser.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                photoOFuser_view.src = URL.createObjectURL(file);
                photoOFuser_view.style.display = "block";
            } else {
                photoOFuser_view.src = "";
                photoOFuser_view.style.display = "none";
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('date_of_birth');

            input.addEventListener('keydown', function (e) {
                e.preventDefault();
            });
            input.addEventListener('click', function (e) {
                e.preventDefault();
            });
            input.addEventListener('paste', function (e) {
                e.preventDefault();
            });

            // ✅ 2: تشغيل Litepicker
            const picker = new Litepicker({
                element: input,
                format: 'YYYY-MM-DD',
                maxDate: new Date(),
                dropdowns: {
                    minYear: 1950,
                    maxYear: new Date().getFullYear(),
                    months: true,
                    years: true
                },
                lang: 'en-US',
                setup: (picker) => {
                    picker.on('selected', (date) => {
                        input.classList.add('is-valid');

                        // ✅ 3: إطلاق حدث input علشان validation يشتغل
                        const event = new Event('input', {
                            bubbles: true,
                            cancelable: true,
                        });
                        input.dispatchEvent(event);
                    });
                }
            });
        });
    </script>
    <script src="{{ secure_asset('js/unpkg.com_xlsx@0.15.1_dist_xlsx.full.min.js') }}"></script>
    <script src="{{ secure_asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ secure_asset('js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('js/bootstrap.js') }}"></script>
    <script src="{{ secure_asset('js/all.min.js') }}"></script>
    <script src="{{ secure_asset('js/main.js') }}"></script>
    <script src="{{ secure_asset('js/log.js') }}"></script>
</body>

</html>
