@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$user->name}}</h1>
                    </div>
                   
                    
                    <div class="card-body">
                        <div class="card-body"> 
                        <img src="{{ $user->image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                        </div>       
                        
                    <p class="depatment">学部:{{$user->department }}</p>
                    <p class="gender">性別:{{ $user->gender }}</p>
                    <p class="grade">学年:{{$user->grade}}</p>
                    <p class="launguage-basis">基準:{{$user->language_basis}}</p>
                    <p class="introduction">自己紹介:{{ $user->introduction}}</p>
                    </div>
                </div>

                
                <div class="card-body">
                    <a href="#">掲示板</a>/
                    <a href="#">出品リスト</a>
                </div>
                <div class="card-header">{{ $user->name }}の出品リスト</div>

                <div class="card-body">
                    

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
            </div>
        </div>
    </div>    
</div>
@endsection