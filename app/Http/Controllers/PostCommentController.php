<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;
use Auth;



use App\PostComment;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = \Request::query();
        // dd($q['post_id']);
        return view('postComments.create', [
            'post_id' => $q['post_id'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCommentRequest $request)
    {
        
        $postComment = new PostComment;
        $input = $request->only($postComment->getfillable());
        $postComment = $postComment->create($input);

        return redirect('/posts/' .$postComment->post_id)->with('message', 'コメントしました');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostComment $postComment)
    {
       
        if ($postComment->user_id != Auth::id()) {
            return abort (500);
        } else {
            $postComment->delete();
            return redirect('/posts/' .$postComment->post_id)->with('message', 'コメントを削除しました');
        }   
       
    }
}
