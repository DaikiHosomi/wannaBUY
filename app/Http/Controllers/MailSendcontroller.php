<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailSendcontroller extends Controller
{
    public function send()
    {
        // メールに表示する内容を設定
        $data = array();
        $data['text'] = 'ここがメール本文です。'; // メール本文

        // 第1引数：メールの内容の表示に使うテンプレート(blade)
        // 第2引数：テンプレートファイルに渡すデータ(配列で渡す)
        // 第3引数：コールバック関数で送信先やタイトルの指定
        Mail::send(
            'emails.test',
            $data,
            function($message) {
                $message
                ->to('daikho2021@gmail.com')       // 送信先アドレス
                ->subject('メールが届きました'); // メールタイトル
            }
        );

        return view('emails.test');
    }
}
