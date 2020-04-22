<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->user_id = Auth::id();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();

        return view('contacts.confirm', [
            'contact' =>  $contact
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        

        $contact = Contact::where('id', $request->contact_id)->first();
       
        //  メールに表示する内容を設定
         $data = array();
         $data['text'] = 'ここがメール本文です。'; 
         
        //  メール本文
        //  第1引数：メールの内容の表示に使うテンプレート(blade)
        //  第2引数：テンプレートファイルに渡すデータ(配列で渡す)
        //  第3引数：コールバック関数で送信先やタイトルの指定
         
        Mail::send(
             'emails.contact',
             ['contact'=> $contact], function($message) use ($contact) {
                 $message->to('wannabuy.apu@gmail.com')   // 送信先アドレス
                 ->subject('お問い合わせがありました');
             }
         );


    
         return view('contacts.thanks', [
             'contact' => $contact,
         ]);

    }

    
}
