
@if(@isset($mood_sended) && !@empty($mood_sended))
    @php $mood = $mood_sended; @endphp
@endif
<!DOCTYPE html>
<html lang="ar">
    <head>
        <!-- meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="this system is private property">
        <!-- link icon -->
        <link rel="icon" href="{{ asset('img/Roaya_icon.png')}}">
        <!-- link css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/staff_data.css')}}">
        <link rel="stylesheet" href="{{asset('css/menu.css')}}">
        <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
        <title>Roaya Pay</title>
        <style>
            .menu > ul > li:nth-child(4):not(.open) > a ,
            .menu > ul > li:nth-child(4) > a + ul > li:nth-child(1) > a{
                background: #5aaa5791 !important;
            }
        </style>
    </head>
    <body>
        <!-- header -->
        @include('./addition.header')
        <!-- content -->
        <div class="content">
            <!-- menu -->
            @include('./addition.menu')
            <!-- show-board -->
            <div class="show-board">
                <div class="title-info">
                    <p>الأعدادات</p>
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
                @if($mood == 'create')
                    <form action="{{ route('setting_create') }}" method="post" id="form">
                        @csrf
                        <div class="modal-header text-light">
                            <h5 class="modal-title" id="showdataTitle">إنشاء عنصر</h5>
                        </div>
                        <div class="form-row py-3">
                            <div class="col-xl-12 col-md-10 col-sm-10 inputs-group">
                                <div class="form-group">
                                    <label for="name"> الأسم على النظام </label>
                                    <input type="text" class="form-control" name="name" id="people_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">البريد على النظام</label>
                                    <input type="text" class="form-control " name="email" id="people_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="text" class="form-control " name="password" id="people_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="ability"> القدرة </label>
                                    <select name="ability" class="form-control" style="width: 209px;" id="people_ability" required>
                                        <option value="" selected disabled></option>
                                        <option value="true">قادر</option>
                                        <option value="false">غير قادر</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="job"> الوظيفة</label>
                                    <input type="text" class="form-control" name="job" id="people_job" required>
                                </div>
                                <div class="form-group">
                                    <label for="active"> النشاط </label>
                                    <select name="active" class="form-control" style="width: 209px;" id="people_active" required>
                                        <option value="" selected disabled></option>
                                        <option value="true">نشط</option>
                                        <option value="false">غير نشط</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success ml-2 w-100" data-dismiss="modal" id="save">تسجيل</button>
                            <button type="reset" class="btn btn-success ml-2 w-100" data-dismiss="modal" id="clear">تنظيف</button>
                        </div>
                    </form>
                @elseif ($mood == 'update')
                    @if (isset($data_edit) && isset($num))
                        <form action="{{ route('setting_update') }}" method="post" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data_edit->id }}">
                            <div class="modal-header text-light">
                                <h5 class="modal-title" id="showdataTitle">تعديل عنصر
                                    <span class="text-succes">
                                        {{ $num }}
                                    </span>
                                </h5>
                            </div>
                            <div class="form-row py-3">
                                <div class="col-xl-12 col-md-10 col-sm-10 inputs-group">
                                    <div class="form-group">
                                        <label for="name"> الأسم على النظام </label>
                                        <input type="text" class="form-control" name="name" id="people_name" value="{{ $data_edit->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">البريد على النظام</label>
                                        <input type="text" class="form-control" style="width:300px !important" name="email" id="people_email" value="{{ $data_edit->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ability"> القدرة </label>
                                        <select name="ability" class="form-control" style="width: 209px;" id="people_ability" required>
                                            <option value="" disabled></option>
                                            <option value="true" {{($data_edit->active ?? '') == 'true' ? 'selected' : '' }}>قادر</option>
                                            <option value="false" {{($data_edit->active ?? '') == 'false' ? 'selected' : '' }}>غير قادر</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="job"> الوظيفة</label>
                                        <input type="text" class="form-control" name="job" id="people_job" value="{{ $data_edit->job }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="active"> النشاط </label>
                                        <select name="active" class="form-control" style="width: 209px;" id="people_active" required>
                                            <option value="" disabled></option>
                                            <option value="true" {{($data_edit->active ?? '') == 'true' ? 'selected' : '' }}>نشط</option>
                                            <option value="false" {{ ($data_edit->active ?? '') == 'false' ? 'selected' : '' }}>غير نشط</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-success ml-2 w-100" data-dismiss="modal" id="save">تعديل</button>
                                <button type="reset" class="btn btn-success ml-2 w-100" data-dismiss="modal" id="clear">تنظيف</button>
                            </div>
                        </form>
                    @endif
                @endif
                <div class="data-info">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr class="no">
                                <th>#</th>
                                <th>الأسم على النظام</th>
                                <th>البريد على النظام</th>
                                <th> القدرة </th>
                                <th> الوظيفة </th>
                                <th> النشاط </th>
                                <th>الاجراءات </th>
                            </tr>
                        </thead>
                        <tbody id="body-data">
                            @if(@isset($data) && !@empty($data))
                                @php $i = 0; @endphp
                                @foreach($data as $row)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->ability }}</td>
                                        <td>{{ $row->job }}</td>
                                        <td>{{ $row->active }}</td>
                                        <td>
                                            <div class='dropdown'>
                                                <button class='btn btn-success dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false' style='padding: 0 !important; height: 35px; width: 55px;'>
                                                    <svg class='svg-inline--fa fa-gear p-1' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='gear' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' data-fa-i2svg=''><path fill='currentColor' d='M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z'></path></svg><!-- <i class='fa fa-cog p-1'></i> Font Awesome fontawesome.com -->
                                                </button>
                                                <div class='dropdown-menu' style='position: absolute; transform: translate3d(2px, 35px, 0px); top: 0px; left: 0px; will-change: transform;' x-placement='bottom-start'>
                                                    <form action="{{ route('setting_edit') }}" method='POST'>
                                                        @csrf
                                                        <input type='hidden' id='id' name='id' value="{{ $row->id }}">
                                                        <input type='hidden' id='id' name='num' value="{{ $i }}">
                                                        <button type='submit' name='edit' class='btn btn-primary w-100 m-1'>
                                                            تعديل
                                                        </button>
                                                    </form>
                                                    <form action={{ route('setting_delete') }} method='post'>
                                                        @csrf
                                                        <input type='hidden' id='id' name='id' value="{{ $row['id'] }}">
                                                        <button class='btn btn-danger w-100 m-1' type='submit'>
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/Roayaut_1.js')}}"></script>
        <script src="{{ asset('js/jquery-3.7.0.min.js')}}"></script>
        <script src="{{ asset('js/popper.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.js')}}"></script>
        <script src="{{ asset('js/all.min.js')}}"></script>
        <script src="{{ asset('js/menu.js')}}"></script>
        <script src="{{ asset('js/unpkg.com_xlsx@0.15.1_dist_xlsx.full.min.js')}}"></script>
        <script src="{{ asset('js/pdf.bundle.min.js')}}"></script>
        <script src="{{ asset('js/pdf.bundle.js')}}"></script>
        <script src="{{ asset('js/export.js')}}"></script>
        <script>
            window.onload = function() {
                $('.settings').removeClass('li')
            }
        </script>
        @if($row['ability'] == true)
            <script>
                document.querySelector('.settings').style.display = 'block';
            </script>
        @else
            <script>
                document.querySelector('.settings').style.display = 'none';
            </script>
        @endif
    </body>
</html>
