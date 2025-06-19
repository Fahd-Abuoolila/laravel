<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url={{ route('create') }}">
    <!-- link -->
    <link rel='icon' href="{{ asset('img/Roaya_icon.png') }}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- title -->
    <title>شركة رؤية باي &nbsp;&nbsp;|&nbsp;&nbsp; تم التسجيل بنجاح </title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
            font-family: Arial, sans-serif;
            background: #f0f0f0 !important;
        }
        h1 {
            color: green;
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px #aaa;
        }
        img {
            width: 200px;
            height: 70vh;
            border: 2px solid #ddd;
            border-radius: 10px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="alert alert-success" role="alert">
        <h1 class=""> ! تم التسجيل بنجاح </h1>
        <h1 class=""> انظر الى البريد الألكتروني الخاص بك </h1>
    </div>
    <img src="{{ asset('img/m010t0669_a_gift_box_22mar23.jpg') }}" alt="هدية" class="w-75">
    <!-- js -->
    <script src='js/jquery-3.7.0.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.js'></script>
    <script src='js/all.min.js'></script>
</body>
</html>
