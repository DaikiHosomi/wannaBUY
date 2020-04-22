@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if($product->sold == '1')
                <p class="alert alert-info">この商品はすでに売り切れています。</p>
                @else
                <p class="alert alert-warning">販売中です！この商品は、交渉および取引が可能です！</p>
                @endif




                <div class="card-header">商品詳細</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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

                
                    
                    <div class="card">
                        <div class="card-body"> 
                            <h4 class="card-title">商品名:{{ $product->product_name }}</h4>


                            @foreach($product->productImages as $productImage)
                            <div class="card-body"> 
                            <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                            </div>                  
                            @endforeach
                        </div>

                        <p class="text-center text-primary">「現在 {{ $favoriteCount }}名がこの商品を👍しています」</p>


                        <table class="table table-borderless table-dark">
                        <tbody>
                            <tr>
                                <th scope="row">出品者</th>
                                <td>{{ $product->user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">クラスカテゴリー</th>
                                <td>{{ $product->productCategory->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">講義名</th>
                                <td>{{ $product->class_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">商品状態</th>
                                <td> {{ $product->productCondition->product_condition }}</td>
                            </tr>
                            <tr>
                                <th scope="row">取引方法</th>
                                <td>{{ $product->transactionWay->transaction_way }}</td>
                            </tr>
                        </tbody>
                        </table>

                       

                        <h5 class="text-center">価格:{{ $product->price }}円</h5>

                        <div class="card-body">商品説明：                         
                            <p lass="card-text">{{ $product->introduction }}</p>
                        </div>
                    </div>  
                       
                    <a href="{{ route('products.index') }}" class="btn btn-secondary float-right">
                        一覧へ戻る
                    </a>
                    
                    @auth
                    @if($product->sold == '1')
                            <button class="btn btn-primary">既に売り切れています</button>
                    @else
                        @if(Auth::user()->id === $product->user_id)
                           
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">編集する</a> 
                        @else
                            <form action="{{ route('buyers.store' ,$product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                    　取引交渉画面へ
                                 </button>
                                 
                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                     <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalCenterTitle">商品名:{{ $product->product_name }}</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                         </div>
                                         <div class="modal-body">
                                             交渉・取引を開始しますか？
                                         </div>
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">はい、取引交渉画面へ行く</button>
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                         </div>
                                     </div>
                                     </div>
                                 </div>
                               
                            </form>  
                        @endif 
                    @endif
                    @endauth 
                    
                    @auth
                    @if(Auth::user()->id === $product->user_id)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                       削除
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $product->product_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                {{ $product->product_name }}を本当に削除してもよろしいですか？
                            </div>
                            <div class="modal-footer">
                            {!! delete_form(['products', $product->id]) !!}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endif 
                    @endauth

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection