@extends('layouts.app')

@section('content')
<div class="head-container">
    <div class="top-card-header text-center mb-3">TimeLine</div>
        <div class="row justify-content-center">
            <div class="card col-md-11">
                
                    <div class="col text-center m-2">
                        <a type="submit" class="post-button" href="{{ route('posts.create') }}"><i class="fas fa-hand-point-right"></i>投稿してみる<i class="fas fa-hand-point-left"></i></a>
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                    <div class="post-card" >
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
                    
                    {{ $posts->links() }}
                
                </div>
           
            </div>
        </div>
</div>

@endsection
