<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> جاري الإرسال... </title>
</head>
<body>
    <form id="sendForm" action="{{ route('send') }}" method="POST">
        @csrf
        <input type="hidden" name="fullname" value="{{ $fullname }}">
        <input type="hidden" name="email" value="{{ $email }}">
    </form>
        <h1>
            <h1>
                جاري الإرسال...
            </h1>
        </h1>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            setTimeout(function() {
                document.getElementById('sendForm').submit();
            }, 1000);
        });
    </script>
</body>
</html>
