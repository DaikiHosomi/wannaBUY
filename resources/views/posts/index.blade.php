@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">掲示板で探す</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> 投稿者:
                                <a href="{{ route('users.show', $post->user_id)}}">
                                {{ $post->user->name }}</a></h5>
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">コメント欄へ</a> 
                        </div>
                    </div>
                    @endforeach

            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
