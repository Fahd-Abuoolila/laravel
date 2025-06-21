<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;600&amp;family=Albert+Sans:wght@400&amp;display=swap" rel="stylesheet" type="text/css" />    <title>رؤية باي - تأكيد الطلب</title>
    <style>
        *{
            font-family:Noto Kufi Arabic,BlinkMacSystemFont,Segoe UI,Helvetica Neue,Arial,sans-serif !important;
        }
        body {
            margin: 0;
            padding: 0;
            font-family:Noto Kufi Arabic,BlinkMacSystemFont,Segoe UI,Helvetica Neue,Arial,sans-serif;
            direction: rtl;
        }
        .email-container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #2d2d2d;
            color: white;
            text-align: center;
            padding: 30px 15px;
        }
        .header img {
            max-width: 110px;
            margin-bottom: 12px;
        }
        .header p {
            margin: 0;
            font-size: 20px;
            font-weight: 400;
        }
        .social-icons {
            background-color: white;
            text-align: center;
            padding: 15px;
        }
        .social-icons img {
            width: 28px;
            margin: 0 12px;
        }
        .content {
            background-color: #0e9c80;
            color: white;
            padding: 35px 25px;
        }
        .title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .title + h3{
            color: #2d2d2d;
        }
        .name-box {
            background-color: #2d2d2d;
            padding: 8px 20px;
            font-weight: 700;
            margin-bottom: 18px;
            color: white;
            font-size: 20px;
            border-radius: 6px;
        }
        .message {
            font-size: 18px;
            line-height: 1.9;
        }
        .message p {
            margin: 10px 0;
        }
        .footer {
            background-color: #2d2d2d;
            text-align: center;
            padding: 15px 15px;
        }
        .footer img {
            max-width: 250px;
        }
        @media (max-width: 600px) {
            .title {
                font-size: 22px;
            }
            .name-box {
                font-size: 18px;
            }
            .message {
                font-size: 16px;
            }
        }
    </style>
</head>
<body dir="rtl">

<div class="email-container">
    <!-- Header -->
    <div class="header">
        <img src="https://uploads.tabular.email/u/ab3c66d8-5d34-426c-a4f7-d1c72d5d922e/00d2e8b4-f842-46ff-a7b4-0a3f936403b6.png" alt="شعار الشركة">
        <p>نرحب بكم في شركة رؤية باي لحلول السداد و البرمجيات</p>
    </div>

    <!-- Social Media Icons -->
    <div class="social-icons">
        <img src="https://90975c7d-74a6-4234-8352-af71f056643c.b-cdn.net/e/aacfd670-4de9-4662-80f2-b7c4d749f1c5/ec30fe74-4590-4c97-a1b2-31b9e3226f6d.png" alt="LinkedIn">
        <img src="https://90975c7d-74a6-4234-8352-af71f056643c.b-cdn.net/e/aacfd670-4de9-4662-80f2-b7c4d749f1c5/1de41b84-ecfc-4dcc-876c-9b20a19eefb5.png" alt="Facebook">
        <img src="https://90975c7d-74a6-4234-8352-af71f056643c.b-cdn.net/e/aacfd670-4de9-4662-80f2-b7c4d749f1c5/63d7a23d-4608-4229-a045-90ebb0c49649.png" alt="Website">
    </div>

    <!-- Main Message -->
    <div class="content">
        <div class="title">السلام عليكم ...</div>
        <h3> الأستاذ :- </h3>
        @if (isset($data))
            <div class="name-box">{{ $fullname }}</div>
        @endif
        <div class="message">
            <p>تم استلام طلب التوظيف الخاص بك بنجاح.</p>
            <p>سيتم الرد عليك قريبًا، و انتظر مكالمة منا أو رسالة بريد إلكتروني أو رسالة على تطبيق الواتساب.</p>
            <p>شكراً لسيادتكم.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <img src="https://fahd-abuoolila.github.io/roaya_photo/roaya.png" alt="رؤية باي">
    </div>
</div>

</body>
</html>
