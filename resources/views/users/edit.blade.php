@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">プロフィールを編集する</div>
        <div class="card-body">

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

           <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}


                {{-- <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="入力してください" name="name">
                </div> --}}




                <div class="card-body">
                    <div class="form-group form-row">
                        <label for="image" class="col-lg-3 col-form-label text-lg-right">プロフィール画像</label>
                        <div class="col-lg-8">
                        <input type="file" name="image">
                        <img src="{{ $user->image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>

                        <div class="col-md-6" style="padding-top: 8px">
                            <input id="gender-m" type="radio" name="gender" value="男子"
                            {{ $user->gender == '男子' ? 'checked' : '' }}>
                            <label for="gender-m" >男性</label>
                            <input id="gender-f" type="radio" name="gender" value="女子"
                            {{ $user->gender == '女子' ? 'checked' : '' }}>
                            <label for="gender-f">女性</label>
                          

                            @if ($errors->has('gender'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="department" class="col-md-4 col-form-label text-md-right">学部</label>

                        <div class="col-md-6" style="padding-top: 8px">
                            <input id="department-m" type="radio" name="department" value="APM"
                            {{ $user->department == 'APM' ? 'checked' : '' }}>
                            <label for="department-m">APM</label>
                            <input id="department-s" type="radio" name="department" value="APS"
                            {{ $user->department == 'APS' ? 'checked' : '' }}>
                            <label for="department-s">APS</label>

                            @if ($errors->has('department'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('department') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        

                    <div class="form-group row">
                        <label for="language_basis" class="col-md-4 col-form-label text-md-right">基準</label>

                        <div class="col-md-6" style="padding-top: 8px">
                            <input id="language_basis-e" type="radio" name="language_basis" value="English"
                            {{ $user->language_basis == 'English' ? 'checked' : '' }}>
                            <label for="language_basis-e">English</label>
                            <input id="language_basis-s" type="radio" name="language_basis" value="日本語"
                            {{ $user->language_basis == '日本語' ? 'checked' : '' }}>
                            <label for="language_basis-s">日本語</label>

                            @if ($errors->has('language_basis'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('language_basis') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="grade" class="col-md-4 col-form-label text-md-right">学年</label>

                        <div class="col-md-6" style="padding-top: 8px">
                            <input id="grade-1" type="radio" name="grade" value="１回生"
                                {{ $user->grade == '１回生' ? 'checked' : '' }}>
                            <label for="language_basis-e">１回生</label>
                            <input id="grade-２" type="radio" name="grade" value="２回生"
                                {{ $user->grade == '２回生' ? 'checked' : '' }}>
                            <label for="language_basis-e">２回生</label>
                            <br>
                            <input id="grade-３" type="radio" name="grade" value="３回生"
                                {{ $user->grade == '３回生' ? 'checked' : '' }}>
                            <label for="language_basis-e">３回生</label>
                            <input id="grade-４" type="radio" name="grade" value="４回生"
                                {{ $user->grade == '４回生' ? 'checked' : '' }}>
                            <label for="language_basis-e">４回生</label>
                            <br>
                            <input id="grade-５" type="radio" name="grade" value="５回生"
                                {{ $user->grade == '５回生' ? 'checked' : '' }}>
                            <label for="language_basis-e">５回生〜</label>
                            
                            @if ($errors->has('grade'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('grade') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="introduction">自己紹介</label>

                        <textarea class="form-control" id="introduction" rows="5"　name="introduction"　placeholder="入力してください">{{ $user->introduction}}</textarea>
                    </div>

                </div>
                    


                
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary">編集する</button>
           </form>
        </div>
 </div>
@endsection