@extends('layouts.app')

@section('content')

<div class="head-container container">
    <div class="top-card-header text-center">Favorite Products</div>     
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-body  text-center p-0">
                        <div class="container">
                            <div class="row">
                                @foreach($user->favorites as $product)
                                <a href="{{ route('products.show', $product->id) }}">
                                    <div class="card col-6 col-md-4">
                                        <div class="product-box post-card card float-left my-3">

                                            @foreach($product->productImages as $productImage)
                                                @if ($loop->first)
                                                    <div class="product-card-body bg-light w-100"> 
                                                        <img src="{{ $productImage->product_image }}" alt="" class="product-image img-responsive img-thumbnail" style="object-fit: cover;">
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
                                                                <button type="submit" class="favorite-button center-block">Yes,wannaBUY!<i class="fas fa-thumbs-up d-none d-sm-block"></i></button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{  route('favorites.favorite', $product->id) }}" method = "POST">
                                                            {{ csrf_field() }}
                                                            <div class="text-center mt-2">
                                                                <button type="submit" class="unfavorite-button center-block">wannaBUY ??? <i class="far fa-thumbs-up d-none d-sm-block"></i></button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @endauth
                                            @endif

                                            <div class="card-body text-center p-2"> 
                                                <h4 class="product-name-index card-text pt-1  font-weight-bold bg-light text-dark">{{ $product->product_name }}</h4>
                                                    <p class="product-category card-text">
                                                        <a href="{{ route('products.index', ['product_category_id' => $product->product_category_id]) }}">
                                                        {{ $product->productCategory->name }}
                                                        </a>
                                                    </p>
                                                    <h5 class="product-price-index card-title font-weight-bold bg-light"><i class="fas fa-yen-sign mr-1"></i>{{ $product->price }}</h5>
                                                <div class="row">
                                                    <div class="col-12 col-md-12 mt-2">
                                                        <p class="card-text text-right" style="z-index: 5;">
                                                            <a href="{{ route('users.show', $product->user_id)}}" class="product-username-index">
                                                                {{ $product->user->name }}
                                                            </a>　
                                                            <img src="{{$product->user->image}}" alt="" class="img-responsive img-thumbnail mx-2" style="height: 30px; width:30px;">
                                                        </p>      
                                                    </div>
                                                </div>                        
                                            </div>                         
                                            <input type="hidden" name="product_condition_id" value="{{ $product->productCondition->product_condition }}">
                                            <input type="hidden" name="transaction_way_id" value="{{ $product->transactionWay->transaction_way }}">
                                            <input type="hidden" name="introduction" value="{{ $product->introduction }}">
                                            <input type="hidden" name="class_name" value="{{ $product->class_name }}">
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
</div>

@endsection