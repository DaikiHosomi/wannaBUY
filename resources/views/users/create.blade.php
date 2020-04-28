@extends('layouts.app')

@section('content')
<div class="head-container">
    <div class="top-card-header text-center mb-2">Register Profile</div>
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

                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row justify-content-center">
                        <div class="card col-xs-12 col-md-10 p-4 m-3 font-weight-bold" style="background-color:rgba(249, 244, 235, 1); border: 3px solid gainsboro;">
                                <div class="form-group row">
                                    <label for="image" class="col-md-4  col-form-label">プロフィール画像</label>    
                                    <input type="file" name="image" class="col-md-8">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif   
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label pl-5" for="gender">性別</label>
                                    <div class="col-md-8 pl-5">
                                        <input id="gender-m" type="radio" name="gender" value="男子">
                                        <label for="gender-m">男性</label>
                                        <input id="gender-f" type="radio" name="gender" value="女子">
                                        <label for="gender-f">女性</label>
                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="department" class="col-md-4 col-form-label pl-5">学部</label>
            
                                    <div class="col-md-8 pl-5">
                                        <input id="department-m" type="radio" name="department" value="APM">
                                        <label for="department-m">APM</label>
                                        <input id="department-s" type="radio" name="department" value="APS">
                                        <label for="department-s">APS</label>
            
                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="language_basis" class="col-md-4 col-form-label pl-5">基準</label>
            
                                    <div class="col-md-8 pl-5">
                                        <input id="language_basis-e" type="radio" name="language_basis" value="English">
                                        <label for="language_basis-e">English</label>
                                        <input id="language_basis-s" type="radio" name="language_basis" value="日本語">
                                        <label for="language_basis-s">日本語</label>
            
                                        @if ($errors->has('language_basis'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('language_basis') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="grade" class="col-md-4 col-form-label pl-5">学年</label>
            
                                    <div class="col-md-8 pl-5">
                                        <input id="grade-1" type="radio" name="grade" value="１回生">
                                        <label for="language_basis-e">１回生</label>
                                        <input id="grade-２" type="radio" name="grade" value="２回生">
                                        <label for="language_basis-e">２回生</label>
                                        <input id="grade-３" type="radio" name="grade" value="３回生">
                                        <label for="language_basis-e">３回生</label>
                                        <br>
                                        <input id="grade-４" type="radio" name="grade" value="４回生">
                                        <label for="language_basis-e">４回生</label>
                                        <input id="grade-５" type="radio" name="grade" value="５回生">
                                        <label for="language_basis-e">５回生〜</label>
                                        
                                        @if ($errors->has('grade'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('grade') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="introduction">自己紹介</label>
                                            <textarea class="form-control" id="introduction" rows="7"　name="introduction"　placeholder="入力してください"></textarea>
                                        </div>
                                    </div>
                                </div>
                               
            
        
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">          
                        </div>         
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-secondary mb-3 w-50">登録する</button>
                    </div>  
                </form>
            </div>
        </div>
</div>
@endsection