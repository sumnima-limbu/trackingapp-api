<?php

namespace App\Http\Controllers\admin;

use App\Models\Circle;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CircleController extends Controller
{
    public function index(Request $request) {
        
        // $circles =  Circle::where('user_id', Auth::id())->get();
        $circles = Circle::where('user_id', Auth::id())->orWhere('friend_id', Auth::id())
                ->get();

        $users = User::all()->where('user_id', Auth::id()); 
    
        // dd($users->circles->users->name);
        return  view('admin.circle', compact('circles', 'users'));

    }
}
