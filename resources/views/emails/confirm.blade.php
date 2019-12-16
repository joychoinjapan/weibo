<html>
<head>
    <meta charset="UTF-8">
    <title>会員登録を完了させてください</title>
</head>
<body>
<h1>このたびはCLUB Impressに新規会員登録いただきましてありがとうございます。</h1>

<p>
    　下記URLをクリックし、登録手続きを完了させて下さい。
    <a href="{{route('confirm_email',$user->activation_token)}}"></a>
</p>
<p>
    このメールにお心当たりがない場合やご不明な点がございましたら、
    下記のフォームからご連絡下さい。
</p>
</body>
</html>
