<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>{{ $user->name }}様</h5>

    <p>こんにちは。『wannaBUY』をご利用いただきありがとうございます。
        <br>
        出品商品である「{{ $product->product_name }}」に対して
        購入検討のユーザーから交渉の依頼を受け取りました。
        <br>
        下記のURLから、交渉ページへとアクセスできます。
        <br>

        【URL】
        <a href = "http://127.0.0.1:8000/products/{{$product->id}}/buyers/{{$buyer->id}}"> http://127.0.0.1:8000/products/{{$product->id}}/buyers/{{$buyer->id}}</a>

    
</body>
</html>


    

