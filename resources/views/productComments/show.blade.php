@extends('layouts.app')

@section('content')
<div class="card-header">コメントページ</div>
<div class="card-body">


    <div class="card">
        <div class="card-body">
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

            @if($buyerProduct->product->sold == '1')
                <h5>取引は終了しています</h5>

             @else
                <div class="card">
                <div class="card-body"> 
                    <h4 class="card-title">商品名:{{ $buyerProduct->product->product_name }}</h4>


                    @foreach( $buyerProduct->product->productImages as $productImage)
                    <div class="card-body"> 
                    <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                    </div>                  
                    @endforeach
                </div>


                <table class="table table-borderless table-dark">
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

               

                <h5 class="text-center">価格:{{ $buyerProduct->product->price }}円</h5>

                <div class="card-body">商品説明：                         
                    <p lass="card-text">{{ $buyerProduct->product->introduction }}</p>
                </div>
            </div> 
            
            <div class="chat">
                <div class="p-3">
                    <h5 class="card-title">コメント一覧</h5>
                    <p class="alert alert-info">以下のチャット欄にて、交渉を行なってください。
                        相互に了承を得た上、日時および場所を決め、実際に取引を行ってください。
                    </p>

                    @foreach($productComments as $comment)
                        <div class="card">
                            <div class="card-body"> 
                            <p class="card-text">投稿者:{{ $comment->user->name }}</p>
                            <p class="card-text">コメント:{{ $comment->comment }}</p>
                            </div>
                        </div>


                    @endforeach  
                </div>
                {{ $productComments->links() }}


                <div class="card-body">
                    <form action="{{ route('productComments.store', $product)  }}" method="POST">
                    {{ csrf_field() }}

                    
                    <div class="form-group">
                        <label for="productComment">コメントを送る</label>
                        <textarea class="form-control" name="comment" id="productComment" rows="3"></textarea>
                    </div>

                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary">コメントする</button>
                    </div>

                    <input type="hidden" name="buyer_id" value="{{ $wannaBuyer }}">     
                    </form>
                </div>
            <div>
   

            <div class="alert alert-danger" role="alert">
                交渉の末、取引を行わない（棄権）場合に関しては、下記のボタンを押してください
                <div class="text-center">
                {{ Form::open(['method' => 'DELETE', 'route' => ['buyers.destroy', $product, $wannaBuyer ]]) }}

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    取引は行わない
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
                <div class="alert alert-success" role="alert">
                取引の実行・終了後に下記のボタンを押してください。
                    <div class="text-center">
                    {{ Form::open(['method' => 'POST', 'route' => ['products.sold', $product]]) }}

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal1">
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

            @endif



        </div>
    </div>
</div>
@endsection