@extends('layouts.app')

@section('content')
<div class="head-container">
    <div class="top-card-header text-center">Confirmation</div>
        <div class="row justify-content-cente">
            <div class="col-md-10 my-2">
                <div class="card">
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

                        <div class="row justify-content-center m-3">
                            <div class="card col-md-10 p-4 font-weight-bold" style="background-color:rgba(249, 244, 235, 1);">
                                
                                <label>お名前:　{{ $contact->name }}</label>
                                <input  type="hidden" name="name" value="{{ $contact->name }}">
                
                                <label>メールアドレス:　 {{ $contact->email }}</label>
                                <input type="hidden" name="email" value="{{ $contact->email }}">
                                    
                            
                                <label>お問い合わせ内容: {{ $contact->comment }}</label>             
                                <input type="hidden" name="body" value="{{ $contact->comment }}">
                
                                @auth 
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endauth
                                <input type="hidden" name="contact_id" value="{{ $contact->id }}">          
                            </div>
                        </div>
                        　
                        　<div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <button type="submit" name="action"　value="submit"　class="btn btn-secondary my-2 w-50">送信する</button>
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <button id="square_btn" onClick="history.back()" class="btn btn-dark my-2 w-50">入力内容修正</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div> 
            </div>
        </div>
</div>
   
@endsection
