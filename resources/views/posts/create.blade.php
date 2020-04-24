@extends('layouts.app')

@section('content')
<div class="head-container">
    <div class="top-card-header text-center">掲示板で募る</div>

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
                                <p for="exampleInputEmail1" class="text-center">「 参考書を募ってみよう！講義のレビューを聞いてみよう！ 」</p>
                                <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="入力してください" name="title" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="col text-center">
                                <button type="submit" class="post btn btn-secondary w-50">投稿する</button>
                            </div>
                        </form>      
                </div>           
        </div>
    </div>
</div>
    
@endsection
