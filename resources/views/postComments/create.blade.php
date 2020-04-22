@extends('layouts.app')

@section('content')
<div class="card-header">コメントページ</div>
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
                    <label for="postComment">Comment</label>
                    <textarea class="form-control" name="comment" id="postComment" rows="5"></textarea>
                </div>

                   
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post_id }}">


                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
           
        </div>
    </div>
@endsection
