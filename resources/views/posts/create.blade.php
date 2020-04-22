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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
           <form action="{{ route('posts.store') }}" method="POST">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="◯◯を探しています" name="title">
                     </div>
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
           
        </div>
    </div>
@endsection
