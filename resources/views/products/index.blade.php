@extends('layouts.app')

@section('content')
<div class="card-body">
    <a href="{{ route('productComments.index') }}" class="btn btn-primary">取引画面一覧</a>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <p class="alert alert-info">検索の際は、１単語で行なってください。</p>
                
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <form action="{{ route('products.search') }}" method="get">
                            {{ csrf_field() }}
                            
                            <label for="search">商品検索</label>
                            <input type="text" class="form-control input-lg" placeholder="キーワードを入力してください" name="search">
                            

                            <span class="input-group-btn" style="position:relative; top: -56px;right: -225px;">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </form>                                                                 
                  </div>
                </div>
            </div>
        </div>
    </div>
    @isset($search_result)
    <h5 class="card-title" >{{ $search_result }}</h5>
    <button id="square_btn" onClick="history.back()">戻る</button>
    @endisset
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($products as $product)
                    <div class="card w-50 float-left">

                       
                        @foreach($product->productImages as $productImage)
                        @if ($loop->first)
                        <div class="card-body"> 
                        <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                        </div>                  
                        @endif
                        @endforeach



                        @if($product->sold == '1')
                            <button class="btn btn-danger">既に売り切れています</button>
                        @else


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
                        @endif

                    




                        <div class="card-body text-center"> 
                            <h5 class="card-text">価格:{{ $product->price }}円</h5>
                            <p class="card-text">カテゴリー:
                                <a href="{{ route('products.index', ['product_category_id' => $product->product_category_id]) }}">
                                    {{ $product->productCategory->name }}</a>
                                </p>
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">出品者:
                            <a href="{{ route('users.show', $product->user_id)}}">
                                {{ $product->user->name }}</a>
                            </p>
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

    @if(isset($search_query))
        {{ $products->appends(['search' => $search_query])->links() }}
    @else
        {{ $products->links() }}
    @endif
    
</div>
@endsection