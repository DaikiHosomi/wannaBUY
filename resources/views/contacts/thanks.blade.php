@extends('layouts.app')

@section('content')
<div class="head-container">
    <div class="top-card-header text-center">Thank You for contacting us !!</div>
        <div class="row justify-content-center">
            <div class=" card col-md-10 my-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row justify-content-center mt-3">
                    <div class="card col-md-10 p-4 font-weight-bold" style="background-color:rgba(249, 244, 235, 1);  border: 3px solid gainsboro">
                        <h5 class="font-weight-bold">お問い合わせ内容を受け付けました。</h1>
                            
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
                </div>
                <div class="text-center">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary my-3 w-50">
                        ホームへ戻る
                    </a>
                </div>
            </div>
        </div>
</div>
@endsection
