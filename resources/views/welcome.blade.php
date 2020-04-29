<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo asset('css/lp.css')?>" type="text/css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Purple+Purse&family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <!-- Styles -->
        <style>
           
        </style>
    </head>

    <body>
        <header class="masthead">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-heading">wannaBUY</div>
                </div>
 
                    @guest
                    <div class="button">  
                        <a href="{{ route('login') }}" class="btn-square-so-login mx-5">ログインする</a>            
                        <a href="{{ route('register') }}" class="btn-square-so-register mx-5">会員登録する</a>
                    </div>
                    @else
                    <div class="button">
                        <a href="{{ route('products.index') }}" class="btn-square-so-login mx-5">ホームへ</a> 
                    </div>
                    @endguest
            </div>
        </header>  

            <section class="features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 feature-top">
                            <div class="feature-title">What is "WannaBUY"?</div>
                            <div class="feature-heading my-5">『完全APU生間　参考書売買サービス』</div>
                        <div>

                        <div class="col-md-12 text-center">
                            <h1 class="feature">特徴</h1>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6 px-5 my-5" >
                            <div class="feature-box box">
                                <div class="feature-list">
                                    <i class="fas fa-search pr-3"></i>学部、講義名で検索できる </div>
                                <p class="feature-text pt-5">学部（APS/APM）、専門分野、言語（英語/日本語）基準などのカテゴリ検索が可能です。</p>
                            </div>
                        </div>

                        <div class="col-md-6 px-5 my-5">
                            <div class="feature-box box">
                                <div class="feature-list">
                                    <i class="fas fa-university pr-3"></i>APU生同士の売買できる </div>
                                <p class="feature-text pt-5">APU生同士のみで交渉と取引を行なっていただけます。取引方法は、基本「天空」もしくは「下界」での現金受渡しです。</p>
                        </div>
                        </div>
                    </div>

                        <div class="row row2">
                            <div class="col-md-6 px-5 my-5">
                                <div class="feature-box box">
                                    <div class="feature-list">
                                        <i class="fas fa-check-square pr-3"></i>販売状況が一目判断できる</div>
                                    <p class="feature-text pt-5">販売状況から、価格の相場や講義で必要な参考文献を知ることができます。</p>
                                </div>
                            </div> 

                            <div class="col-md-6 px-5 my-5">
                                <div class="feature-box box">
                                    <div class="feature-list pt-5t">
                                        <i class="fas fa-chalkboard-teacher pr-3"></i>掲示板で販売を募れる</div>
                                    <p class="feature-text pt-5"> 必要になった参考書を掲示板で募ることができます。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="way-to-use">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="way-title mt-5">How to Use</div>
                        </div>

                        <div class="col-md-12 text-center">
                            <h3 class="way">使い方</h3>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-md-6">
                            <img src="https://cdn.pixabay.com/photo/2017/08/06/22/12/books-2596900_1280.jpg"  class="d-none d-sm-block image-list img-fluid"  alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="way-box box mt-5">
                                <div class="way-item py-3">In selling</div>
                                <ol style="list-style-type: decimal"  class="way-text py-1">
                                    <li>APU講義で使用した参考書を準備 </li>
                                    <li>写真を撮ってアップロード</li>
                                    <li>商品名・説明を記入。カテゴリー・商品の状態等を選択</li>
                                    <li>出品</li>
                                    <li>交渉＆取引受付ける</li>
                                    <li>交渉依頼を受けた際には、登録時のE-mailに通知される</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-md-6">
                            <div class="way-box box mt-5">
                                <div class="way-item py-3">In buying</div>
                                <ol style="list-style-type: decimal"  class="way-text py-1">
                                    <li>学部名・講義名・講義カテゴリーなどで商品検索</li>
                                    <li>（もしなかったら掲示板で募る）</li>
                                    <li>購入希望商品があれば、取引画面にて交渉</li>
                                    <li>（交渉の末、取引を行わない選択も可能）</li>
                                    <li>合意の上、取引を行う</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="https://cdn.pixabay.com/photo/2018/05/28/11/51/woman-3435842_1280.jpg" class="image-list img-fluid" alt="">                 
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-md-6">
                            <img src="https://www.apu.ac.jp/home/img/contents/campusmap.html/a.jpg" class="image-list img-fluid"  alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="way-box box mt-5">
                                <div class="way-item py-3">In actioning</div>
                                <ol style="list-style-type: decimal"  class="way-text py-1">
                                    <li>交渉受付ページから交渉画面へ行く</li>
                                    <li>交渉画面で、 取引日時を決める</li>
                                    <li>（取引方法は、基本的に天空か下界にて現金直接取引）</li>
                                    <li>合意の上、取引を行う</li>
                                    <li>出品者は、取引直後、取引完了ボタンを押す</li>
                                </ol>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="last-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="last-heading">Let’s get started!</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="last-text">wannaBUYは、APU生向けサービスです。是非APU生で助け合って参考書を手に入れましょう！</div>
                        </div>
                    </div>

                    <div class="row">
                       <div class="col-md-12 my-5">
                        @guest           
                            <a href="{{ route('register') }}" class="btn-square-so-register mx-5">会員登録する</a>
                        </div>
                        @else
                            <a href="{{ route('products.index') }}" class="btn-square-so-login mx-5">ホームへ</a> 
                        @endguest         
                       </div>
                    </div>




                </div>
            </section>





</body>

</html>
