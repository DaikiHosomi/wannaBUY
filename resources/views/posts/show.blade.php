@extends('layouts.app')

@section('content')
<div class="card-header">掲示板で募る</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                投稿者:{{ $post->user->name }}</h5>
            <h5 class="card-title">{{$post->title}}</h5>

            <a href="{{ route('posts.index') }}" class="btn btn-secondary float-right">
            一覧へ戻る
        </a>

        @if(Auth::user()->id === $post->user_id)
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
           削除
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">【確認】</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    投稿を本当に削除してもよろしいですか？
                </div>
                <div class="modal-footer">
                    {!! delete_form(['posts', $post->id]) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        @endif
        </div>

        
        
    

    <div class="p-3">
        <h5 class="card-title">コメント一覧</h5>
        @foreach($post->postComments as $postComment)
            <div class="card">
                <div class="card-body"> 
                    <p class="card-text">{{ $postComment->comment }}</p>
                    <p class="card-text">投稿者:{{ $postComment->user->name }}</p>
                </div>
            </div>

                @if(Auth::user()->id === $postComment->user->id)
                {!! delete_form(['postComments', $postComment->id]) !!}
                @endif
                
        @endforeach
       
        @auth
        <a href="{{ route('postComments.create', ['post_id' => $post->id]) }}" class="btn btn-primary">コメントする</a>
        @endauth

            
    </div>

   

        





    </div>
    
@endsection
