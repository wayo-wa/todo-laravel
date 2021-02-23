<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //user情報をtriggerComponent.vueに渡す
    public function index() {
        if(Auth::check()) {
            $user = Auth::user();
        }else{
            $user = '';
        }
        return $user;
    }
}
