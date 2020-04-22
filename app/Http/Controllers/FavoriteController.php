<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Favorite;

class FavoriteController extends Controller
{

    // public function favorite(Product $product, Request $request) {
       
    //     $favorite = Favorite::create(['user_id' => $request->user_id, 'product_id' => $product->id ]);

    //     return response()->json([]);
    // }

    public function store(Request $request, $id) {
            \Auth::user()->favorite($id);
            return back();
    }

    public function destroy($id) {
            \Auth::user()->unfavorite($id);
            return back();
    }

}
