@extends('layouts.app')

@section('content')
<div class="head-container container">
    <div class="top-card-header text-center mb-2">Contact</div>
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
    
                <form action="{{ route('contacts.store') }}" method="POST">
                    {{ csrf_field() }}
    
                    <div class="row justify-content-center mt-3" >

                        <div class="col-md-9 p-4 font-weight-bold" style="background-color:rgba(249, 244, 235, 1); border: 3px solid gainsboro; width:85%;">
                            <div class="form-group">
                                <label for="exampleInputEmail1">名前</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="入力してください" name="name">
                            </div>
    
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">メールアドレス</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="入力してください">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">お問い合わせ内容</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="５" name="comment" placeholder="入力してください"></textarea>
                            </div>
                            @auth 
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                        </div>
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-secondary my-3 w-50">確認画面へ</button>
                    </div>
                </form>
            </div>
        </div>        
</div>   
@endsection
