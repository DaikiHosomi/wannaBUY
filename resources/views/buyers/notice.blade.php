@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                
                    <div class="card-header alert alert-info">現在交渉依頼はありません。</div>
                
                    <div class="card-header alert alert-info">あなたの商品に交渉したいユーザーが現れました。<br>交渉ページへ進んでください。</div>  
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach($buyers as $buyer)
                   
                    <div class="card">
                    <h5 class="card-header">商品名 <a href="{{ route('products.show', $buyer->product->id) }}">【{{ $buyer->product->product_name }}】</a></h5>
                        <div class="card-body">
                            @if($buyer->product->sold == 1) 
                                <h5>この取引は終了しました</h5>
                            @else 
                                <h5 class="card-title">交渉依頼者:{{ $buyer->user->name }}</h5>
                                <p>交渉依頼時間:{{ $buyer->updated_at }}</p>
                             <a href="{{ route('buyers.show', ['product'=>$buyer->product->id,'buyer'=>$buyer->id])}}" class="btn btn-primary">交渉＆取引ページへ</a>
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
