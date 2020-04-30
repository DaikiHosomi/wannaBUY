@extends('layouts.app')

@section('content')
<div class="head-container">

    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="top-card-header text-center">Product's detail</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        
                </div>
             
              
        </div> 
    </div>
<div class="card bg-light">
    <div class="row justify-content-center m-4">
        <div class="col-md-12">
            <h3 class="card-title text-center" style=" font-family: 'Ubuntu', sans-serif;">{{ $product->product_name }}</h3>     
        </div>
    
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" style="border: 10px solid gainsboro;">
                                @foreach($product->productImages as $productImage)
                                　@if ($productImage->image_number === 1)
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-responsive img-thumbnail" src="{{ $productImage->product_image }}" alt="First slide" style="height: 250px;">
                                </div>
                                @endif

                                @if ($productImage->image_number === 2)
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-responsive img-thumbnail" src="{{ $productImage->product_image }}" alt="Second slide" style="height: 250px;">
                                </div>
                                @endif


                                @if ($productImage->image_number === 3)
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-responsive img-thumbnail" src="{{ $productImage->product_image }}" alt="Third slide" style="height: 250px;">
                                </div>
                                @endif
                                @endforeach  


                                @if(count($product->productImages) > 1)
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                @endif
                            </div>
                        </div>  
                        
                    <p class="product-time text-right my-3">出品日時:{{ $product->published_at }}</p>
                    </div>                  
                                  
                    





                    <div class="col-md-6">
                        <table class="table table-striped font-weight-bold text-center" style="border: 8px solid gainsboro;">
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
                    </div>
                </div>   
                
                
                <div class="row ">
                    <div class="col-md-6 text-center">
                        <h2 class="mt-3 font-weight-bold bg-white"> <i class="fas fa-yen-sign mr-1"></i>{{ $product->price }}</h2>
                    </div>

                    <div class="col-md-6">
                        @auth
                        @if (Auth::user()->is_favorite($product->id))

                        <form action="{{ route('favorites.unfavorite', $product->id) }}" method = "POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="text-center">
                                <button type="submit" class="favorite-button center-block">Yes,wannaBUY!<i class="fas fa-thumbs-up"></i></button>
                            </div>
                        </form>

                        @else

                        <form action="{{  route('favorites.favorite', $product->id) }}" method = "POST">
                            {{ csrf_field() }}
                            <div class="text-center">
                            <button type="submit" class="unfavorite-button center-block">wannaBUY ??? <i class="far fa-thumbs-up"></i></button>
                            </div>
                        </form>

                        @endif
                        @endauth
                        <p class="text-center text-primary">「現在 {{ $favoriteCount }}名がこの商品を👍しています」</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="text-center mb-2">
                            <button class="product-introduction font-weight-bold" style="border: 2px solid gainsboro;">商品説明</button>
                        </div>

                        <div class="card-body bg-white" style="border: 3px solid gainsboro;">                        
                            <p lass="card-text">{{ $product->introduction }}</p>
                        </div>
                    </div>   
                </div>



                <div class="row">
                    <div class="col-6 col-md-6 mt-2">
                    <a class="back-button btn btn-light" style="border: 3px solid #A9A9A9; border-radius: 10px;" href="{{ route('products.index') }}">
                            back<i class="fas fa-undo-alt"></i>
                        </a>   
                    </div>
                
                    <div class="col-6 col-md-6 text-right mt-2">
                        @auth
                            @if(Auth::user()->id === $product->user_id )                             
                                <!-- Button trigger modal -->
                                <button type="button" class="product-delete-button product-delete-button btn-light" data-toggle="modal" data-target="#exampleModalCenter" style="border: 2px solid #778899; border-radius: 10px;">
                                    <i class="fas fa-trash-alt"></i>
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
                           
                                @if($product->sold == '')
                                    <a href="{{ route('products.edit', $product->id) }}" class="product-edit-button btn btn-light float-left;" style="border: 2px solid #4682B4; border-radius: 10px;"><i class="far fa-edit"></i></a> 
                                @endif
                            
                                
                            @endif 
                        @endauth 

                    </div>
                </div>


                



                
                <div class="row">
                    <div class="col-md-12 text-center my-4">
                    @auth
                        @if($product->sold == '1')
                                    <button class="sold-out-show btn btn-danger" style="border: 5px solid gainsboro; border-radius: 25px;">
                                        <i class="fas fa-praying-hands mr-2"></i>既に売り切れています<i class="fas fa-praying-hands mr-2"></i></button>
                        @elseif(Auth::user()->id != $product->user_id)
                            <form action="{{ route('buyers.store' ,$product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <!-- Button trigger modal -->
                                <button type="button" class="buyer-button-show" data-toggle="modal" data-target="#exampleModalCenter" 
                                        style="border: 5px solid gainsboro; border-radius: 25px; background-color:#008080; color: white;">
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
                    @endauth    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
    
            

                {{-- @if($product->sold == '1')
                <p class="alert alert-info">この商品はすでに売り切れています。</p>
                @else
                <p class="alert alert-warning">販売中です！この商品は、交渉および取引が可能です！</p>
                @endif --}}
    

    
@endsection