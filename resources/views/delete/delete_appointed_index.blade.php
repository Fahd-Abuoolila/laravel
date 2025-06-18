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
            .menu > ul > li:nth-child(2):not(.open) > a ,
            .menu > ul > li:nth-child(2) > a + ul > li:nth-child(2) > a{
                background: #5aaa5791 !important;
            }
            .table th, .table td {
                padding: 0.75rem .30rem !important;
            }
        </style>
    </head>
    <body>
        <!-- header -->

        @include('../addition.header')

        <!-- content -->
        <div class='content'>
            <!-- menu -->
            @include('../addition.menu')
            <!-- show-board -->
            <div class='show-board'>
                <div class='title-info'>
                    <p>بيانات الموظفين</p>
                    <div class='dropdowns'>
                        <div class='dropdown mx-2 my-2'>
                            <button class='btn dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>
                                تصدير
                            </button>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item px-1' onclick="ExportToXLSX('xls')">
                                    <button class='btn btn-info text-center text-light ml-2 w-100'>
                                        التصدير الي إكسيل
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group is-invalid">
                    <form method="post" class="d-flex w-100">
                        <input class="form-control my-2" style="height: 38px;" type="search" placeholder="البحث" id="searchInput" name="searchInput" onkeypress="showdata(this.value)" aria-label="Search">
                        <select class="select my-2" aria-label="search_items" id="search_items" name="search_items">
                            <option value="name">الاسم</option>
                            <option value="date">التاريخ</option>
                            <option value="governorate">المحافظة</option>
                        </select>
                        <button type="submit" name="search" class="btn my-2"> بحث </button>
                    </form>
                </div>
                <div class='data-info'>
                    <table class='table table-bordered table-striped' id='table'>
                        <thead>
                            <tr class="no">
                                <th>الكود</th>
                                <th>اسم الموظف</th>
                                <th>المحافظة</th>
                                <th>موعد التسجيل</th>
                                <th>الوظيفة</th>
                                <th>رقم الهاتف</th>
                                <th>السبب</th>
                                <th>الملاحظة</th>
                                <th>الاجراء </th>
                            </tr>
                        </thead>
                        <tbody id='body-data'>
                            @if(@isset($data) && !@empty($data))
                                @php $i = 0; @endphp
                                @foreach($data as $row)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->first_name }} {{ $row->second_name }} {{ $row->third_name }} {{ $row->last_name }}</td>
                                        <td>{{ $row->governorate }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{{ $row->job_required }}</td>
                                        <td>{{ $row->number_tel_1 }}</td>
                                        <td>{{ $row->reason }}</td>
                                        <td>{{ $row->reason_notes }}</td>
                                        <td>
                                            <div class='dropdown'>
                                                <button class='btn btn-success dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false' style='padding: 0 !important; height: 35px; width: 55px;'>
                                                    <svg class='svg-inline--fa fa-gear p-1' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='gear' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' data-fa-i2svg=''><path fill='currentColor' d='M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z'></path></svg><!-- <i class='fa fa-cog p-1'></i> Font Awesome fontawesome.com -->
                                                </button>
                                                <div class='dropdown-menu' style='position: absolute; transform: translate3d(2px, 35px, 0px); top: 0px; left: 0px; will-change: transform;' x-placement='bottom-start'>
                                                    <form action="{{ route( 'show_delete_appointed_index')}}" type='submit' method='post'>
                                                        @csrf
                                                        <input type='hidden' id='id' name='id' value="{{ $row->employee_id }}">
                                                        <button class='btn btn-primary w-100 my-1'>
                                                            عــرض
                                                        </button>
                                                    </form>
                                                    <button type='button' class='btn btn-danger w-100 my-1' data-toggle='modal' data-target='#exampleModal{{$i}}'>
                                                        حذف
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <form action="{{ route( 'delete_appointed_forever')}}" method='post'>
                                        @csrf
                                        <div class='modal fade' id='exampleModal{{$i}}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabel'>
                                                            <span class='badge text-danger'>{{ $row->first_name }} {{ $row->second_name }} {{ $row->third_name }} {{ $row->last_name }}</span>
                                                        </h5>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <input type='hidden' id='id' name='id' value="{{ $row->employee_id }}">
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='reset' class='btn btn-secondary' data-dismiss='modal'>اغلاق</button>
                                                        <button type='submit' class='btn btn-danger mr-2'>تأكيد الحذف</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif
                        </tbody>
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
