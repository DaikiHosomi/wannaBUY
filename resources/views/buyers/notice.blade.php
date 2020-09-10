@extends('layouts.app')

@section('content')
<div class="head-container container">
    <div class="top-card-header text-center">Negotiation Request</div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>

        


        <div class="row justify-content-center m-3">
            <div class="card col-md-9">

                <div class="ask-alert card-header alert alert-success my-3 text-center"  style="border-radius: 25px;">交渉依頼の有無を確認をしよう</div>  

                        <ul class="negotiation-nav nav nav-tabs mb-3">    
                            <li class="nav-item"><a href="{{ route('productComments.index')}}" class="nav-link
                                {{  isset($ask['status']) ? '' : 'active' }}">交渉されている</a></li>

                            <li class="nav-item"><a href="?status=ask" class="nav-link
                                {{  isset($ask['status']) ? 'active' : '' }}">交渉している</a></li>
                        </ul>


                        <div class="tab-content">
                            <div class="tab-pane active">
                
                            @foreach($buyers as $buyer)
                                <div class="card m-2" style="border: 3px solid gainsboro;">
                                        <div class="card p-2" style="background-color:rgba(249, 244, 235, 1);">
                                            <h4 class="header pt-2 text-center"><a href="{{ route('products.show', $buyer->product->id) }}">【{{ $buyer->product->product_name }}】</a></h4>
                                        @if($buyer->product->sold == 1)
                                            <p class="card-title font-weight-bold mx-2"> <i class="fas fa-user-check mr-2"></i> 出品者{{ $buyer->product->user->name }} 様</p>
                                            <div class="text-center">
                                                <h5 class="button btn btn-secondary w-75 py-2 px-1" style="border: 5px solid gainsboro; border-radius: 25px;">この取引は終了しました</h5>
                                            </div>
                                        @else
                                        <div class="row px-3">

                                            <div class="col-md-7 mt-3">
                                                <h5 class="card-title font-weight-bold"> <i class="fas fa-user mr-2">交渉者</i>{{ $buyer->user->name }} 様</h5>
                                            </div>
                                            <div class="col-md-5">
                                                <p class="post-time text-right">交渉依頼日時<br>{{ $buyer->updated_at }}</p>
                                            </div>
                                        </div>

                                        <div class="text-center mb-3">
                                            <a href="{{ route('buyers.show', ['product'=>$buyer->product->id,'buyer'=>$buyer->id])}}"
                                                type="button" class="button btn py-2 w-75 font-weight-bold" style="border: 5px solid gainsboro; border-radius: 25px; background-color:#008080; color: white;">
                                                <i class="fas fa-bell"></i>  取引交渉画面へ <i class="fas fa-bell"></i>
                                            <a>
                                        </div>
                                                
                                        @endif
                                        </div>   
                                </div>

                            @endforeach

                            </div>
                    
                        </div>  
             
                
            </div>
        </div>
 </div>

                
               
@endsection
