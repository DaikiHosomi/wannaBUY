@extends('layouts.app')

@section('content')

<div class="head-container">
    <div class="top-card-header text-center mb-3">My List</div>
    <div class="row justify-content-center">
        <div class="card col-md-11">
            <div class="text-center my-4">
                @auth
                    @if(Auth::user()->id === $user->id)
                    　　 @if(!isset($user->department))
                            <a type="submit" class="post-button mt-0" href="{{ route('users.create') }}"><i class="fas fa-hand-point-right"></i>プロフィールを登録する<i class="fas fa-hand-point-left"></i></a>
                        @else
                            <a type="submit" class="post-button mt-0" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-hand-point-right"></i>編集する<i class="fas fa-hand-point-left"></i></a>
                        @endif
                    @endif
                @endauth
             </div>
 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- <h1>{{$user->name}}</h1> --}}

                 @if(isset($user->department))
                    <div class="profile row justify-content-center">
                        @if(isset($user->image))
                        <div class="col-md-5 text-center">
                            <img src="{{ $user->image }}" alt="" class="img-responsive img-thumbnail m-4 p-0" style="min-height: 200px; height-auto; objective-fit: cover; border-radius: 25%;">
                        </div>
                        @else
                        <div class="col-md-5">
                            <a class="btn btn-secondary m-4 p-0 w-100 h-75 text-center" style="border-radius: 25%; color:white; line-height:110px;">画像が登録されていません</a>
                        </div>
                        @endif


                        <div class="col-md-7 my-4">
                            <div class="card-body text-center p-0 my-1">
                                <h3 class="font-weight-bold ">{{$user->name}}</h3>
                                <h5>{{$user->department }}・{{$user->grade}}
                                <br>{{$user->language_basis}}基準・{{ $user->gender }}</h5>
                            </div>
                            

                            <div class="card-body text-center p-0 my-1">                        
                                <p lass="card-text">{{ $user->introduction }}</p>
                            </div>

                        </div>
                    </div>
                 @endif
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-12 my-4">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item"><a href="#product" class="nav-link active" data-toggle="tab">商品一覧</a></li>
                        <li class="nav-item"><a class="nav-link" href="#post" data-toggle="tab">投稿一覧</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="product">

                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card bg-light">
                                        
                
                                        <div class="card-body text-center">
                                            
                
                                        <div class="row">
                                            @foreach($user->products as $product)
                                                <div class="col-md-4">
                                                <div class="product-box post-card card float-left my-2">
                
                                            
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
                        
                        </div>


                        <div class="tab-pane" id="post">
                            <div class="row justify-content-center mx-1">
                                <div class="card col-md-12">
                                    
                                    <div class="card-body">
                    
                                        @foreach($user->posts as $post)
                                        <div class="post-card">
                                            <div class="post-card-body">
                                            
                                            <h5 class="card-title"><img src="{{$post->user->image}}" alt="" class="img-responsive img-thumbnail" style="height: 50px; width:50px;">
                                                <p class="post-time" style="float:right;"> {{ $post->published_at }}</p>
                                                    <a href="{{ route('users.show', $post->user_id)}}" class="post-name px-3">
                                                    {{ $post->user->name }}</a></h5>
                                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary" style="float:right;"><i class="far fa-comment-dots"></i></a> 
                                                <h5 class="post-title card-title">{{ $post->title }}</h5>
                                            </div>
                                        </div>
                                        @endforeach

                                        
                                      
                                    </div>
                                 
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>   
        </div>    
    </div> 
    
</div> 
@endsection