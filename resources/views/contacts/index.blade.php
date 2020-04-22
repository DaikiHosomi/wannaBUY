@extends('layouts.app')

@section('content')
<div class="card-header">お問い合わせ</div>
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

           <form action="{{ route('contacts.store') }}" method="POST">
                {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleInputEmail1">名前</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="入力してください" name="name">
                     </div>


                     <div class="form-group">
                        <label for="exampleInputEmail1">E-mail Adress</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">お問い合わせ内容</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="５" name="comment"></textarea>
                      </div>
                     @auth 
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                <button type="submit" class="btn btn-primary">確認画面へ</button>
            </form>
           
        </div>
    </div>
@endsection
