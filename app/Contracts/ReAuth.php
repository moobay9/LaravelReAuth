<?php

namespace Funaffect\LaravelReAuth\Contracts;

use Illuminate\Http\Request;
use Funaffect\LaravelReAuth\Http\Requests\ReAuthRequest;

trait ReAuth {
    /**
     * index パスワード入力画面の表示
     *
     * @access public
     * @return void
     */
    public function index(Request $request)
    {
        // フラッシュセッションの中身が空っぽの場合は既定のトップへ遷移
        if ( ! $request->session()->get('re-auth'))
        {
            return redirect(config('reauth.fallback'));
        }

        // なければセッションを維持してビューを表示
        $request->session()->reflash();
        return view('reauth::validpassword');
    }

    /**
     * top メンバー初期画面の表示
     *
     * @access public
     * @return void
     */
    public function validpassword(ReAuthRequest $request)
    {
        // エラー以外を引き継いで持っていく
        $request->session()->forget('errors');
        $request->session()->reflash();

        return redirect($request->session()->get('re-auth'));
    }
}