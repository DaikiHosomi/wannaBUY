@extends('layouts.app')

@section('content')

<div class="head-container container">
    <div class="top-card-header text-center mb-2">Posting</div>
    <div class="row justify-content-center">
        <div class="card col-md-10 my-2">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

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

                <div class="row justify-content-center mt-3" >
                    <div class="col-md-10">
                        <div class="form-group">
                            <p for="exampleInputEmail1" class="post-create-text text-center">「 参考書を募ってみよう！講義のレビューを聞いてみよう！ 」</p>
                            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="入力してください" name="title" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                </div>           
                <div class="col text-center">
                    <button type="submit" class="post btn btn-secondary w-50 mb-3">投稿する</button>
                </div>
            </form>      
        </div>
    </div>
</div>

@endsection
