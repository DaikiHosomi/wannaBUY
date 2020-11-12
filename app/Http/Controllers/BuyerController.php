<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use App\User;
use App\Buyer;
use App\ProductComment;
use Illuminate\Support\Facades\Mail;

class BuyerController extends Controller
{
    public function store(Request $request)
    {

        $wannaBuyer = Buyer::where('product_id', $request->product_id)
        ->where('user_id', Auth::id())
        ->first();

    if($wannaBuyer) {
            return redirect()->route('buyers.show', [
                
                'product' => $request->product_id,
                'productComment' =>  $wannaBuyer->id,
            
            ]); 

    } 
        
        $wannaBuyer = new Buyer; 
        $wannaBuyer->product_id = $request->product_id;
        $wannaBuyer->user_id = Auth::id();
        $wannaBuyer->save();

        $RequestProduct = Product::where('id', $request->product_id)->first();
        $RequestProduct->load('user');
        $buyerMail = User::where('id',$RequestProduct->user->id)->first();
    
         // メールに表示する内容を設定
        $data = array();
        $data['text'] = 'ここがメール本文です。'; 
        
         // メール本文
        //  第1引数：メールの内容の表示に使うテンプレート(blade)
        //  第2引数：テンプレートファイルに渡すデータ(配列で渡す)
        //  第3引数：コールバック関数で送信先やタイトルの指定
        
        Mail::send(
            'emails.test',
            ['user'=> $buyerMail, 'buyer' => $wannaBuyer, 'product' => $RequestProduct], function($message) use ($buyerMail) {
                 $message->to($buyerMail->email)   // 送信先アドレス
                ->subject('交渉依頼がありました');
            }
        );

        return redirect()->route('buyers.show', [     
                'product' => $request->product_id,
                'buyer' =>  $wannaBuyer->id,
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product,$wannaBuyer)
    {
    
        $buyer = Buyer::where('id', $wannaBuyer)->first();

        $buyerProduct = Buyer::where('id', $wannaBuyer)->where('product_id', $product)
        ->first();
        $buyerProduct->load('product');
    
        $productComments = ProductComment::where('buyer_id',$wannaBuyer)->paginate(4);
        $productComments->load('user');
        
        return view('productComments.show', compact('product', 'wannaBuyer','buyer', 'buyerProduct', 'productComments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product, $wannaBuyer)
    {
        
        $wannaBuyer = Buyer::where('product_id', $product)->where('id', $wannaBuyer)->delete();
        return redirect('/products')->with('message', '取引を破棄しました');
    }

}
