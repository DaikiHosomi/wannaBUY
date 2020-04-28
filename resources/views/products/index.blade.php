@extends('layouts.app')

@section('content')

<div class="head-container container">
    <div class="top-card-header text-center">Home</div>
        <div class="card-body">
            
                <div class="row">
                    <div class="col-md-8">
                       
                        
                        <div id="custom-search-input">
                            <div class="input-group text-center" >
                                <form action="{{ route('products.search') }}" method="get" class="search-form">
                                    {{ csrf_field() }}
                                    
                                    <label for="search" class="font-weight-bold">商品検索(１単語で行う）</label>
                                    <input type="text" class="form-control input-lg w-100" placeholder="入力してください" name="search" size="25" maxlength="10">
                                    
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="submit" style="position: absolute;top: 30px;left: 375px;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                </form> 
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a type="submit" class="head-product-button text-center" href="{{ route('products.create') }}">出品</a>                                                     
                    </div>

                    <div class="col-md-2">
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
                <div class="col-md-12">
                    <div class="card bg-light">
                        

                        <div class="card-body text-center">
                            

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <div class="row">
                            @foreach($products as $product)
                             <div class="col-xs-2 col-md-4">
                                <div class="product-box post-card card float-left my-3">

                            
                                    @foreach($product->productImages as $productImage)
                                    @if ($loop->first)
                                    <div class="product-card-body bg-light"> 
                                    <img src="{{ $productImage->product_image }}" alt="" class="product-image img-responsive img-thumbnail w-100" style="height: 200px; objective-fit:cover;">
                                    </div>                  
                                    @endif
                                    @endforeach



                                    @if($product->sold == '1')
                                    <div class="text-center m-1">
                                        <button class="sold-button w-75 font-weight-bold"> <i class="fas fa-praying-hands mr-2"></i> SoldOut <i class="fas fa-praying-hands ml-2"></i></button>
                                    </div>
                                    @else


                                        @auth
                                        @if (Auth::user()->is_favorite($product->id))



                                        <form action="{{ route('favorites.unfavorite', $product->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="text-center mt-2">
                                            <button type="submit" class="favorite-button center-block">”Yes,wannaBUY!” <i class="fas fa-thumbs-up"></i></button>
                                            </div>
                                        </form>

                                        @else

                                        <form action="{{  route('favorites.favorite', $product->id) }}" method = "POST">
                                            {{ csrf_field() }}
                                            <div class="text-center mt-2">
                                            <button type="submit" class="unfavorite-button center-block">”wannaBUY ???” <i class="far fa-thumbs-up"></i></button>
                                            </div>
                                        </form>

                                        @endif
                                        @endauth
                                    @endif

                            




                                    <div class="card-body text-center p-2"> 
                                        <h4 class="card-text pt-1  font-weight-bold bg-light">{{ $product->product_name }}</h4>
                                        <p class="product-category card-text">カテゴリー:
                                            <a href="{{ route('products.index', ['product_category_id' => $product->product_category_id]) }}">
                                                {{ $product->productCategory->name }}</a>
                                            </p>
                                        <h5 class="card-title font-weight-bold bg-light"><i class="fas fa-yen-sign mr-1"></i>{{ $product->price }}</h5>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="text-left" style="height: 30px;">
                                                    <a href="{{ route('products.show', $product->id) }}" class="product-detail">詳細画面へ<i class="far fa-hand-point-right"></i></a>
                                                </div>    
                                            </div>

                                            <div class="col-md-6 text-right">
                                                <p class="card-text" style="z-index: 5;">
                                                    <a href="{{ route('users.show', $product->user_id)}}" >
                                                        {{ $product->user->name }}</a>　<img src="{{$product->user->image}}" alt="" class="img-responsive img-thumbnail mx-2" style="height: 30px; width:30px;">
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
                             @endforeach
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