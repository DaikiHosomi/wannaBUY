<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductCommentRequest;
use Illuminate\Http\Request;
use App\Product;
use App\ProductComment;
use Auth;
use App\User;
use App\Buyer;

class ProductCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    $ask = $request->query();
    
        if(isset($ask['status'])) {
            $buyers = Buyer::where('user_id', Auth::id())->get();
            $buyers->load('user', 'product.user');
        } else {
            $buyers = Buyer::latest('created_at')->
            //productとのリレーションをロードする
            whereHas('product', function($q){
                $q->where('user_id', Auth::id());
            })->get();
            $buyers->load('user', 'product');
        }
        return view('buyers.notice', compact('buyers','ask'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('productComments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCommentRequest $request)
    {
        $productComment = new ProductComment;
        $productComment->buyer_id = $request->buyer_id;
        $productComment->comment = $request->comment;
        $productComment->user_id = Auth::id();
        $productComment->save();

        $productComment->load('wannaBuyer.product');
    

        return redirect()->route('buyers.show', [
            
            'product' => $productComment->wannaBuyer->product->id,
            'buyer' => $request->buyer_id,
    ]);

    }
}
