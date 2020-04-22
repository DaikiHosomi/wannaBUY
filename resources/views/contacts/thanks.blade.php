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

            お問い合わせ内容を受け付けました。<br>
            <br>
            ■名前<br>
            {{ $contact->name}}様
            <br>
            <br>
            ■メールアドレス<br>
            {{ $contact->email }}<br>
            <br>
            ■お問い合わせ内容<br>
            {{ $contact->comment}}<br>

        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary float-right">
            ホームへ戻る
        </a>

    </div>
@endsection
