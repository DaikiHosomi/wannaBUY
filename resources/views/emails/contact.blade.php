<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせを受け付けました。</title>
</head>
<body>


    <p>ユーザー様から、お問い合わせを受け取りました。 </p>

    詳細<br>
    <br>
    ■名前<br>
    {{ $contact->name}}様
    <br>
    <br>
    ■メールアドレス<br>
    {{ $contact->email }}<br>
    <br>
    ■お問い合わせ内容<br>
    {{ $contact->comment}}<br>

    
</body>
</html>