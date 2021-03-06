@extends('layouts.app')

@section('content')

<div class="head-container container">
    <div class="top-card-header text-center">Home</div>
        <div class="mini-body card-body">
            <div class="row">
                <div class="col-6">   
                    <div id="custom-search-input">
                        <div class="input-group text-center" >
                            <form action="{{ route('products.search') }}" method="get" class="search-form">
                                {{ csrf_field() }}
                                
                                <label for="search" class="search-text font-weight-bold">商品検索(１単語で行う）</label>
                                <input type="text" class="form-control input-lg w-100" placeholder="探す" name="search" size="25" maxlength="10">
                                
                                <span class="input-group-btn">
                                    <button class="search-mark btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </form> 
                        </div> 
                    </div>
                </div>
                <div class="head-button col-2">
                    <a type="submit" class="head-product-button text-center" href="{{ route('products.create') }}">出品</a>                                                     
                </div>

                <div class="head-button2 col-2">
                    <a type="submit" class="head-buyer-button text-center" href="{{ route('productComments.index') }}">交渉依頼確認</a>                                                     
                </div>
            </div>
            @isset($search_result)
            <div class="text-center">
                <h3 class="card-title text-center" >{{ $search_result }}</h3>
                <button id="square_btn" onClick="history.back()">戻る</button>
            </div>
            @endisset
        </div>
            
        <div class="row justify-content-center">
            <div class="col-md-12 p-0">
                <div class="card bg-light">
                    <div class="card-body  text-center p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                @foreach($products as $product)
                                <a href="{{ route('products.show', $product->id) }}">
                                    <div class="card col-6 col-md-4 p-0 p-md-3 my-1">
                                        <div class="product-box post-card card float-left mx-1">

                                            @foreach($product->productImages as $productImage)
                                                @if ($loop->first)
                                                    <div class="product-card-body bg-light w-100"> 
                                                        <span class="product-price"><i class="fas fa-yen-sign mr-1"></i>{{ $product->price }}</span>
                                                        <img src="{{ $productImage->product_image }}" alt="" class="product-image img-responsive img-thumbnail p-0" style="object-fit: cover;">
                                                    </div>                  
                                                @endif
                                            @endforeach

                                            @if($product->sold == '1')
                                                <div class="text-center mt-2">
                                                    <button class="sold-button w-75 font-weight-bold"> <i class="fas fa-praying-hands mr-2"></i> SoldOut</button>
                                                </div>
                                            @else

                                                @auth
                                                    @if (Auth::user()->is_favorite($product->id))
                                                        <form action="{{ route('favorites.unfavorite', $product->id) }}" method = "POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <div class="text-center mt-2">
                                                                <button type="submit" class="favorite-button center-block">Yes,wannaBUY!<i class="fas fa-thumbs-up d-none d-sm-inline-block mx-2"></i></button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{  route('favorites.favorite', $product->id) }}" method = "POST">
                                                            {{ csrf_field() }}
                                                            <div class="text-center mt-2">
                                                                <button type="submit" class="unfavorite-button center-block">wannaBUY ??? <i class="far fa-thumbs-up d-none d-sm-inline-block mx-2"></i></button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @endauth
                                            @endif

                                            <div class="card-body text-center p-2"> 
                                                {{-- <h4 class="product-name-index card-text pt-1  font-weight-bold bg-light text-dark">{{ $product->product_name }}</h4> --}}
                                                    <p class="product-category card-text">
                                                        <a href="{{ route('products.index', ['product_category_id' => $product->product_category_id]) }}">
                                                        {{ $product->productCategory->name }}
                                                        </a>
                                                    </p>
                                                {{-- <div class="row">
                                                    <div class="col-12 col-md-12 mt-2">
                                                        <p class="card-text text-right" style="z-index: 5;">
                                                            <a href="{{ route('users.show', $product->user_id)}}" class="product-username-index">
                                                                {{ $product->user->name }}
                                                            </a>　
                                                            <img src="{{$product->user->image}}" alt="" class="img-responsive img-thumbnail mx-2" style="height: 30px; width:30px;">
                                                        </p>      
                                                    </div>
                                                </div>                         --}}
                                            </div>                         
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
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