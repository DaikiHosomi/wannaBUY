@extends('layouts.app')

@section('content')
<div class="card-header">出品する</div>
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

           <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}


                

                <div class="card-body">
                    <div class="form-group form-row">
                        <label for="productImage" class="col-lg-3 col-form-label text-lg-right">商品画像</label>
                        <div class="col-lg-8">
                        <input type="file" name="product_image1">
                        @if ($errors->has('product_image1'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('product_image1') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group form-row">
                        <label for="productImage" class="col-lg-3 col-form-label text-lg-right">商品画像</label>
                        <div class="col-lg-8">
                        <input type="file" name="product_image2">
                        @if ($errors->has('product_image2'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('product_image2') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group form-row">
                        <label for="productImage" class="col-lg-3 col-form-label text-lg-right">商品画像</label>
                        <div class="col-lg-8">
                        <input type="file" name="product_image3">
                        @if ($errors->has('product_image3'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('product_image3') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="form-group">
                            <label for="productCategory">講義カテゴリー</label>
                            <select class="form-control" id="formControlSelect1"　name="product_category_id">
                            <option selected="">選択する</option>  
                            @foreach ($productCatgories as $productCategory)
                            <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                            @endforeach
                                <!-- <option selected="">選択する</option>  
                                <option value="1">APS/環境・開発</option>
                                <option value="2">APS/観光学</option>
                                <option value="3">APS/国際関係</option>
                                <option value="4">APS/文化・社会・メディア</option>
                                <option value="5">APS/その他</option>
                                <option value="6">APM/会計・ファイナンス</option>
                                <option value="7">APM/マーケティング</option>
                                <option value="8">APM/経営戦略と組織</option>
                                <option value="9">APM/イノベーション・経済学</option>
                                <option value="10">APM/その他</option>
                                <option value="11">共通教養科目/APUリテラシー</option>
                                <option value="12">共通教養科目/世界市民基盤</option>
                                <option value="13">共通教養科目/社会ニーズ対応</option>
                                <option value="14">言語科目/英語</option>
                                <option value="15">言語科目/日本語</option>
                                <option value="16">言語科目/AP言語</option>
                                <option value="17">資格試験参考書</option>
                                <option value="18">その他</option> -->
                            </select>
                    </div>

                    <div class="form-group">    
                        <label for="className">講義名</label>
                        <input type="text" class="form-control" id="className" placeholder="入力してください" name="class_name">
                    </div>   

                    <div class="form-group">
                        <label for="productCondition">商品状態</label>
                        <select class="form-control" id="formControlSelect1" name="product_condition_id">
                        <option selected="">選択する</option>
                        @foreach($productConditions as $productCondition)
                        <option value="{{ $productCondition->id }}">{{ $productCondition->product_condition }}</option>
                        @endforeach
                            <!-- <option value="1">新品・未使用</option>
                            <option value="2">書き込みはほとんどない</option>
                            <option value="3">少しの書き込み汚れあり</option>
                            <option value="4">やや書き込み汚れありあり</option>
                            <option value="5">全体的に書き込み汚れありあり</option> -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transactionWay">取引方法</label>
                        <select class="form-control" id="formControlSelect1" name="transaction_way_id">
                        <option selected="">選択する</option>
                        @foreach($transactionWays as $transactionWay)
                        <option value="{{ $transactionWay->id }}">{{ $transactionWay->transaction_way }}</option>
                        @endforeach
                            <!-- <option value="1">天空受渡・現金取引</option>
                            <option value="2">下界受渡・現金取引</option>
                            <option value="3">その他</option> -->
                        </select>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">商品名</label>
                        <input type="text" class="form-control" id="productName" placeholder="入力してください" name="product_name">
                     </div>   

                     <div class="form-group">
                        <label for="introduction">商品説明</label>
                        <textarea class="form-control" id="introduction" rows="5"　name="introduction"　placeholder="入力してください"></textarea>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">価格</label>
                        <span>(￥)</span>
                        <input type="text" class="form-control" id="price" placeholder="価格" name="price"　placeholder="入力してください">
                    </div>   
                </div>
        
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
               
                <button type="submit" class="btn btn-primary">Submit</button>
           </form>
</div>
@endsection