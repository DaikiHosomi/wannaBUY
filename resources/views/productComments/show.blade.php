@extends('layouts.app')

@section('content')

<div class="head-container">   
    <div class="row justify-content-center">
        <div class="col-md-10">      
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="top-card-header text-center">Negotiation & Action</div>   
        </div> 
    </div>

    <div class="card bg-light my-3">
        <div class="row justify-content-center m-4">
            <div class="col-md-12">
                <h3 class="card-title text-center" style=" font-family: 'Ubuntu', sans-serif;">{{ $buyerProduct->product->product_name }}</h3>     
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" style="border: 10px solid gainsboro;">
                                @foreach($buyerProduct->product->productImages as $productImage)
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

                                @if(count($buyerProduct->product->productImages) > 1)
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
                    </div>           
                        
                    <div class="col-md-6">
                        <table class="table table-striped font-weight-bold text-center" style="border: 8px solid gainsboro;">
                            <tbody>
                                <tr>
                                    <th scope="row">出品者</th>
                                    <td>{{ $buyerProduct->product->user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">クラスカテゴリー</th>
                                    <td>{{ $buyerProduct->product->productCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">講義名</th>
                                    <td>{{ $buyerProduct->product->class_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">商品状態</th>
                                    <td> {{ $buyerProduct->product->productCondition->product_condition }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">取引方法</th>
                                    <td>{{ $buyerProduct->product->transactionWay->transaction_way }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="text-center mt-2">
                            <button class="font-weight-bold" style="border: 2px solid gainsboro;">商品説明</button>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-2">
                    <div class="col-md-12">
                        <div class="card-body bg-white" style="border: 3px solid gainsboro;">                        
                            <p lass="card-text">{{ $buyerProduct->product->introduction }}</p>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card bg-light my-3">
                <div class="row justify-content-center">
                    <div class="col-md-10 p-3">   
                        <p class="ask-alert alert alert-info text-center" style="border-radius: 25px;">以下で交渉を行なってください。<br>
                            相互に了承を得た上、日時および場所を決め、実際に取引を行ってください。
                        </p>             
                        <h5 class="card-title text-center font-weight-bold">コメント一覧</h5>              
                        @foreach($productComments as $comment)
                            <div class="card">
                                <div class="card-body" style="min-height: 125px;  background-color:rgba(249, 244, 235, 1); border: 2px solid gainsboro; "> 
                                    <p class="post-time float-right">{{ $comment->created_at }}</p>
                                    <p class="card-text font-weight-bold"><img src="{{$comment->user->image}}" alt="" class="img-responsive img-thumbnail mr-3" style="height: 50px; width:50px;">
                                        {{ $comment->user->name }}
                                    </p>
                                    <p class="card-text px-5">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach  
                        {{ $productComments->links() }}
                    </div> 
                </div>
    
                <div class="row justify-content-center">
                    <div class="col-md-6 p-2 text-center">
                        @if($buyerProduct->product->sold == '')
                            <form action="{{ route('productComments.store', $product)  }}" method="POST">
                                {{ csrf_field() }}   
                                <div class="form-group ">
                                    <textarea class="form-control" name="comment" id="productComment" rows="2" placeholder="入力してください"></textarea>
                                </div>
                                <input type="hidden" name="buyer_id" value="{{ $wannaBuyer }}"> 
                                <div>
                                    <button type="submit" class="btn btn-secondary"><i class="far fa-comment-dots"></i>コメントする</button>
                                </div>           
                            </form>
                        @endif
                    </div>
                </div>      
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-light my-3">
                @if($buyerProduct->product->sold == '1')
                    <h5>取引は終了しています</h5>
                @else
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="ask-alert alert alert-danger text-center my-3" role="alert" style="border-radius: 25px;">
                            交渉の末、取引を行わない（棄権）場合は、下記のボタンを押してください
                            <div class="text-center">
                                {{ Form::open(['method' => 'DELETE', 'route' => ['buyers.destroy', $product, $wannaBuyer ]]) }}
                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius: 25px; border: 2px solid white;">
                                    取引は行わない。
                                </button>
                            
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">商品名:{{ $buyerProduct->product->product_name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            ボタンを押すと元に戻れなくなります。<br>
                                            再度交渉の際は、改めて商品ページから行なってください。
                                        </div>
                                        <div class="modal-footer">
                                            {{ Form::submit('取引を行わない', ['class' => 'btn btn-danger']) }}
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{ Form::close() }} 
                                </div>         
                            </div>

                            @if(Auth::user()->id === $buyerProduct->product->user->id)
                            <div>
                                <div class="ask-alert alert alert-success text-center my-3" role="alert" style="border-radius: 25px;">
                                取引の実行・終了後に下記のボタンを押してください。
                                    <div class="text-center">
                                        {{ Form::open(['method' => 'POST', 'route' => ['products.sold', $product]]) }}

                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1" style="border-radius: 25px; border: 2px solid white;">
                                            取引が完了しました。
                                        </button>
                                        <div class="modal fade" id="modal1" tabindex="-1"
                                            role="dialog" aria-labelledby="label1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="label1">商品名:{{ $buyerProduct->product->product_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ボタンを押すと元に戻れなくなります。   
                                                        取引は本当に完了しましたか。
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{ Form::submit('取引が完了しました', ['class' => 'btn btn-success']) }}
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="sold" value="1">
                                        <input type="hidden" name="product_id" value="{{ $product }}">   
                                        {{ Form::close() }} 
                                    </div>             
                                </div>
                            </div>
                            @endif                  
                        </div>
                    </div> 
                @endif
            </div>
        </div>
    </div>
</div>

@endsection