<?php

namespace App\Http\Controllers;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Product;
use Auth;
use App\Post;
use App\Favorite;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        
        $user = Auth::user();
        
      

        $user->load('products','posts');

        return view('users.index', [
            'user' => $user,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $user = Auth::user();
        $user -> gender = $request->gender;
        $user -> department = $request->department;
        $user -> language_basis = $request->language_basis;
        $user -> grade = $request->grade;
        $user -> introduction = $request->introduction;
        $user->save();


        $data = $request->all();
        if ($logo = $request->file('image')) {   
            $image_name = $logo->getRealPath();
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::show($publicId, [
                'width'     => $width,
                'height'    => $height
            ]);
            $user-> image = $logoUrl;
            $user->save();
         }
     
        

         return redirect('/users')->with('message', 'プロフィールを登録しました');   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $user->load('products', 'posts');
    
        return view('users.index', [
            'user' => $user,           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        dd($request);
        $user = User::find($id);
        $user -> gender = $request->gender;
        $user -> department = $request->department;
        $user -> language_basis = $request->language_basis;
        $user -> grade = $request->grade;
        $user -> introduction = $request->introduction;
        $user->save();


    

        if($request->file('image')){
            if ($logo = $request->file('image')) {   
                $image_name = $logo->getRealPath();
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::show($publicId, [
                    'width'     => $width,
                    'height'    => $height
                ]);
                $user-> image = $logoUrl;
                $user->save();
         }
         
        }
     
         return redirect('/users')->with('message', 'プロフィールを編集しました');   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function favorite(User $user) {
    
        $user = Auth::user();

        $user->load('favorites');


        return view('users.favorite', [
            'user' => $user,           
        ]);
    }
}
