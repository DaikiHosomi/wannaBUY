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

            
            <form method="POST" action="{{ route('contacts.sned') }}">
                @csrf
                
            <div class="card">
                <label>名前::{{ $contact->name }}</label>
                <input  type="hidden" name="name" value="{{ $contact->name }}">

                <label>メールアドレス:: {{ $contact->email }}</label>
                <input type="hidden" name="email" value="{{ $contact->email }}">
                    
            
                <label>お問い合わせ内容:: {{ $contact->comment }}</label>             
                <input type="hidden" name="body" value="{{ $contact->comment }}">

                @auth 
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endauth
                <input type="hidden" name="contact_id" value="{{ $contact->id }}">

            </div>
                <button type="submit" name="action" value="submit"> 送信する </button>
            </form>
            <button id="square_btn" onClick="history.back()">入力内容修正</button>
        </div>
    </div>
@endsection
