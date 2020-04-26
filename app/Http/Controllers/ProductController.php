<?php

namespace App\Http\Controllers;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\User;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\ProductCondition;
use App\TransactionWay;
use App\Buyer;
use Carbon\Carbon;

use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = \Request::query();
        $productCategories = ProductCategory::all();

        
        
        if(isset($q['product_category_id'])) {
            $user = Auth::user();
            $products = Product::latest('published_at')
            ->where('product_category_id', $q['product_category_id'])
            ->paginate(12);

            $products->load('user','productCategory','productCondition', 'transactionWay', 'productImages');
            return view('products.index', [
                'products' => $products,
                'user' => $user,               
            ]);
         } else {
            $user = Auth::user();
            $products = Product::latest('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->paginate(12);

            $products->load('user','productCategory','productCondition', 'transactionWay', 'productImages');
            return view('products.index', [
                'products' => $products,
                'user' => $user,               
            ]);
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $productCategories = ProductCategory::all();
        $productConditions = ProductCondition::all();
        $transactionWay = TransactionWay::all();
       

        return view('products.create', [
            'productCatgories' => $productCategories,
            'productConditions' => $productConditions,
            'transactionWays' => $transactionWay

        ]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request);
        $product = new Product;
        $product -> user_id = $request->user_id;
        $product -> product_name = $request->product_name;
        $product -> introduction = $request->introduction;
        $product -> class_name = $request->class_name;
        $product -> price = $request->price;
        $product -> product_category_id = $request->product_category_id;
        $product -> product_condition_id= $request->product_condition_id;
        $product -> transaction_way_id = $request->transaction_way_id;
        $product->save();
        
        
        
        
        foreach($request->files as $key=>$file)
        {

            if($key === "product_image1") {
                $productImage = new ProductImage;
                $productImage -> product_id = $product->id;
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::show($publicId, [
                    'width'     => $width, 
                    'height'    => $height
                ]);
                $productImage-> product_image = $logoUrl;
                $productImage-> image_number = 1;
                $productImage->save();
                }

            if ($key === "product_image2") {
                $productImage = new ProductImage;
                $productImage -> product_id = $product->id;
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::show($publicId, [
                    'width'     => $width, 
                    'height'    => $height
                ]);
                $productImage-> product_image = $logoUrl;
                $productImage-> image_number = 2;
                $productImage->save();
                }

            if ($key === "product_image3") {
                $productImage = new ProductImage;
                $productImage -> product_id = $product->id;
                $image_name = $file->getRealPath();
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::show($publicId, [
                    'width'     => $width, 
                    'height'    => $height
                ]);
                $productImage-> product_image = $logoUrl;
                $productImage-> image_number = 3;
                $productImage->save();
                }

         }
        return redirect('/')->with('message', '商品を出品しました');   
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) 
    {
       
       
        $product->load('user','favorites');    
        $favoriteCount = $product->favorites()->count();
  
        return view('products.show', [
            'product' => $product,
            'favoriteCount' => $favoriteCount,
        ]);

    }  
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {

        $product =  Product::find($id);
        $product -> user_id = $request->user_id;
        $product -> product_name = $request->product_name;
        $product -> introduction = $request->introduction;
        $product -> class_name = $request->class_name;
        $product -> price = $request->price;
        $product -> product_category_id = $request->product_category_id;
        $product -> product_condition_id= $request->product_condition_id;
        $product -> transaction_way_id = $request->transaction_way_id;
        $product->save();
        $product->load('productImages');

    
     
        
        foreach($request->files as $key=>$file) {

        if ($key == "product_image1") {
            $image_name = $file->getRealPath();
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::show($publicId, [
                'width'     => $width, 
                'height'    => $height
            ]);
         if($productImage = ProductImage::where('product_id',$id)->where('image_number',1)->first()) {
                $productImage-> product_image = $logoUrl;
                $productImage->save(); 
            }
        }
        
        if ($key == "product_image2") {
            $image_name = $file->getRealPath();
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::show($publicId, [
                'width'     => $width, 
                'height'    => $height
            ]);
         if($productImage = ProductImage::where('product_id',$id)->where('image_number',2)->first()) {
                $productImage-> product_image = $logoUrl;
                $productImage->save(); 
            }
        }
        if ($key == "product_image3") {
            $image_name = $file->getRealPath();
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::show($publicId, [
                'width'     => $width, 
                'height'    => $height
            ]);
         if($productImage = ProductImage::where('product_id',$id)->where('image_number',3)->first()) {
                $productImage-> product_image = $logoUrl;
                $productImage->save(); 
            }
        }
            
       }
    
        return redirect('/')->with('message', '商品を編集しました');;
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->user_id != Auth::id()) {
            return abort (500);
        } else {
            $product->delete();
            return redirect("/")->with('message', '商品を削除しました');
        }
    }

    public function __construct() 
    {
        $this->middleware('auth')
            ->except(['index','show']);
    }


    public function search(Request $request)
    {
        
        
       
       
        $products = Product::where('product_name', 'like', "%{$request->search}%")
                ->orwhere('introduction', 'like', "%{$request->search}%")
                ->orwhere('class_name', 'like', "%{$request->search}%")
                ->orWhereHas('productCategory', function($query) use($request) {
                    $query->where('name', 'like', "%{$request->search}%");})
                ->latest('published_at')
                ->paginate(6);
            
       

          $search_result = $request->search.'の検索結果'.$products->total().'件';
          
        
        return view('products.index', [
            'products' =>$products,
            'search_result' =>$search_result,
            'search_query' => $request->search,
        ]);
    }

    public function sold(Request $request)
    {
       $product = Product::find($request->product_id);
       $product->sold = $request->sold;
       $product->save();
        

       return redirect()->route('products.show', $product->id);

    }



   
}
