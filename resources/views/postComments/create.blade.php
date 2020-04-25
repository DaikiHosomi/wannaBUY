@extends('layouts.app')

@section('content')
<div class="head-container">
    <div class="top-card-header text-center">Comment</div>
    <div class="card-body">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        
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
            <form action="{{ route('postComments.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <p for="postComment" class="text-center">コメントをして下さい！</p>
                        <textarea class="form-control" name="comment" id="postComment" rows="2"></textarea>
                    </div>

                    
                        
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">


                        <div class="col text-center">
                            <button type="submit" class="post btn btn-secondary w-50">コメントする</button>
                        </div>
                    </form>
            
            </div>
        </div>
    </div>
@endsection
