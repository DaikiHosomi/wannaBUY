@extends('layouts.app')

@section('content')
<div class="card-header">編集する</div>
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

           <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
                {{ csrf_field() }}

           
                <div class="card-body">
                    <div class="form-group form-row">
                        <label for="productImage" class="col-lg-3 col-form-label text-lg-right">商品画像</label>
                        <div class="col-lg-8">
                        <input type="file" name="product_image1">
                        @foreach($product->productImages as $productImage)
                        @if ($productImage->image_number === 1)
                        <div class="card-body"> 
                        <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                        </div>                  
                        @endif
                        @endforeach
                       
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

                        @foreach($product->productImages as $productImage)
                        @if ($productImage->image_number === 2)
                        <div class="card-body"> 
                        <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                        </div>                  
                        @endif
                        @endforeach

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

                        @foreach($product->productImages as $productImage)
                        @if ($productImage->image_number === 3)
                        <div class="card-body"> 
                        <img src="{{ $productImage->product_image }}" alt="" class="img-responsive img-thumbnail" style="height: 250px; width:400px; ">
                        </div>                  
                        @endif
                        @endforeach

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
                                <option value="1" {{ $product->product_category_id === 1? "selected":"" }} >APS/環境・開発</option>
                                <option value="2" {{ $product->product_category_id === 2? "selected":"" }}>APS/観光学</option>
                                <option value="3" {{ $product->product_category_id === 3? "selected":"" }}>APS/国際関係</option>
                                <option value="4" {{ $product->product_category_id === 4? "selected":"" }}>APS/文化・社会・メディア</option>
                                <option value="5" {{ $product->product_category_id === 5? "selected":"" }}>APS/その他</option>
                                <option value="6" {{ $product->product_category_id === 6? "selected":"" }}>APM/会計・ファイナンス</option>
                                <option value="7" {{ $product->product_category_id === 7? "selected":"" }}>APM/マーケティング</option>
                                <option value="8" {{ $product->product_category_id === 8? "selected":"" }}>APM/経営戦略と組織</option>
                                <option value="9" {{ $product->product_category_id === 9? "selected":"" }}>APM/イノベーション・経済学</option>
                                <option value="10" {{ $product->product_category_id === 10? "selected":"" }}>APM/その他</option>
                                <option value="11" {{ $product->product_category_id === 11? "selected":"" }}>共通教養科目/APUリテラシー</option>
                                <option value="12" {{ $product->product_category_id === 12? "selected":"" }}>共通教養科目/世界市民基盤</option>
                                <option value="13" {{ $product->product_category_id === 13? "selected":"" }}>共通教養科目/社会ニーズ対応</option>
                                <option value="14" {{ $product->product_category_id === 14? "selected":"" }}>言語科目/英語</option>
                                <option value="15" {{ $product->product_category_id === 15? "selected":"" }}>言語科目/日本語</option>
                                <option value="16" {{ $product->product_category_id === 16? "selected":"" }}>言語科目/AP言語</option>
                                <option value="17" {{ $product->product_category_id === 17? "selected":"" }}>資格試験参考書</option>
                                <option value="18" {{ $product->product_category_id === 18? "selected":"" }}>その他</option>
                            </select>
                    </div>

                    <div class="form-group">    
                        <label for="className">講義名</label>
                        <input type="text" class="form-control" id="className" placeholder="入力してください" name="class_name" value="{{ $product->class_name }}">
                    </div>   

                    <div class="form-group">
                        <label for="productCondition">商品状態</label>
                        <select class="form-control" id="formControlSelect1" name="product_condition_id">
                        <option selected="">選択する</option>
                            
                            <option value="1" {{ $product->product_condition_id === 1? "selected":"" }}>新品・未使用</option>
                            <option value="2" {{ $product->product_condition_id === 2? "selected":"" }}>書き込みはほとんどない</option>
                            <option value="3" {{ $product->product_condition_id === 3? "selected":"" }}>少しの書き込み汚れあり</option>
                            <option value="4" {{ $product->product_condition_id === 4? "selected":"" }}>やや書き込み汚れありあり</option>
                            <option value="5" {{ $product->product_condition_id === 5? "selected":"" }}>全体的に書き込み汚れありあり</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="transactionWay">取引方法</label>
                        <select class="form-control" id="formControlSelect1" name="transaction_way_id">
                        <option selected="">選択する</option>
                            <option value="1" {{ $product->transaction_way_id === 1? "selected":"" }}>天空受渡・現金取引</option>
                            <option value="2" {{ $product->transaction_way_id === 2? "selected":"" }}>下界受渡・現金取引</option>
                            <option value="3" {{ $product->transaction_way_id === 3? "selected":"" }}>その他</option>
                        </select>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">商品名</label>
                        <input type="text" class="form-control" id="productName" placeholder="入力してください" name="product_name" value="{{ $product->product_name }}">
                     </div>   

                     <div class="form-group">
                        <label for="introduction">商品説明</label>
                        <textarea class="form-control" id="introduction" rows="5"　name="introduction"　placeholder="入力してください">{{ $product->introduction }}</textarea>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">価格</label>
                        <span>(￥)</span>
                        <input type="text" class="form-control" id="price" placeholder="価格" name="price"　placeholder="数字を入力してください"　value="{{ $product->price }}">
                    </div>   
                </div>

                
               
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary"> 編集する</button>
           </form>
</div>
@endsection