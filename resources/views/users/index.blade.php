@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>My List 〜{{$user->name}}〜　</h1>
    </div>

    @if($user->department == '')
    <a href="{{ route('users.create') }}" class="btn btn-primary">プロフィールを登録する</a>
    
    @else
        
        <div class="card-body">
            <div class="card-body"> 
            <img src="{{ $user->image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
        </div>  
        
        @auth
            @if(Auth::user()->id === $user->id)
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">編集する</a> 
            @endif
            @endauth 
        
        <ul class="card">
   
            <li class="depatment">学部:{{$user->department }}</li>
            <li class="gender">性別:{{ $user->gender }}</li>
            <li class="grade">学年:{{$user->grade}}</li>
            <li class="launguage-basis">{{$user->language_basis}}基準</li>
            <li class="introduction">自己紹介:{{ $user->introduction}}</li>
        <ul>
        
    @endif
</div>


<ul class="nav nav-tabs padding-18">

    <li>
        <a data-toggle="tab" href="#product">
             出品リスト
        </a>
    </li>

    <li>
        <a data-toggle="tab" href="#post">
            　掲示板投稿
        </a>
    </li>

</ul>



<div class="card-body"　id="product">
    <div class="card-header">{{ $user->name }}の出品リスト</div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @foreach($user->products as $product)
    <div class="card w-50 float-left">

        
        @foreach($product->productImages as $productImage)
        @if ($loop->first)
        <div class="card-body"> 
        <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
        </div>                  
        @endif
        @endforeach

        @auth
        @if (Auth::user()->is_favorite($product->id))

        <form action="{{ route('favorites.unfavorite', $product->id) }}" method = "POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="button btn btn-secondary center-block">いいね👍を外す</button>
        </form>

        @else

        <form action="{{  route('favorites.favorite', $product->id) }}" method = "POST">
            {{ csrf_field() }}
            <button type="submit" class="button btn btn-outline-secondary  center-block">いいね👍を付ける</button>
        </form>

        @endif
        @endauth

    




        <div class="card-body text-center"> 
            <h5 class="card-text">価格:{{ $product->price }}円</h5>
            <p class="card-text">カテゴリー:
                <a href="{{ route('products.index', ['product_category_id' => $product->product_category_id]) }}">
                    {{ $product->productCategory->name }}</a>
                </p>
            <h5 class="card-title">{{ $product->product_name }}</h5>
            <p class="card-text">出品者:
            <a href="{{ route('users.show', $product->user_id)}}"></a>
                {{ $product->user->name }}</p>
        </div>
        
        <input type="hidden" name="product_condition_id" value="{{ $product->productCondition->product_condition }}">
        <input type="hidden" name="transaction_way_id" value="{{ $product->transactionWay->transaction_way }}">
        <input type="hidden" name="introduction" value="{{ $product->introduction }}">
        <input type="hidden" name="class_name" value="{{ $product->class_name }}">
        
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">詳細ページ</a>
    </div>
    @endforeach
</div>


</div class=" card-body" id="post">
<div class="card-header">{{ $user->name }}の投稿</div>
@foreach($user->posts as $post)
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> 投稿者:
            <a href="{{ route('users.show', $post->user_id)}}">
            {{ $post->user->name }}</a></h5>
        <h5 class="card-title">{{ $post->title }}</h5>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">コメント欄へ</a> 
    </div>
</div>
@endforeach

</div>


@endsection