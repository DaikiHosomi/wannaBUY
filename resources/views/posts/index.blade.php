@extends('layouts.app')

@section('content')

<div class="head-container container">
    <div class="top-card-header text-center mb-3">TimeLine</div>
        <div class="row justify-content-center">
            <div class="card col-xs-12 col-md-10">          
                <div class="col text-center m-2">
                    <a type="submit" class="post-button" href="{{ route('posts.create') }}"><i class="fas fa-hand-point-right"></i>投稿してみる<i class="fas fa-hand-point-left"></i></a>
                </div>

                @if (session('status'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                @foreach($posts as $post)
                    <div class="post-index card my-1" style="background-color:rgba(249, 244, 235, 1); border: 3px solid gainsboro;">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <img src="{{$post->user->image}}" alt="" class="post-image img-responsive img-thumbnail mt-3 p-0" style="height: 35px; width: 35px;">
                                <a href="{{ route('users.show', $post->user_id)}}" class="post-name px-3">
                                    {{ $post->user->name }}
                                </a>
                            </div>

                            <div class="col-3 text-right  mt-3">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="comment-icon far fa-comment-dots"></i>
                                </a> 
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-9">
                                <h5 class="post-title card-title">{{ $post->title }}</h5>
                            </div>
                            <div class="col-2 text-right">
                                <p class="post-time d-none d-sm-block" style="float:right;"> {{ $post->published_at }}</p>
                            
                            </diV>  
                        </diV>                  
                    </div>                    
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
</div>

@endsection
