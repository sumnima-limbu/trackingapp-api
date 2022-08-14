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

        $circle_group = Circle::all()->groupBy('user_id');

        $data = [];

        foreach ($circle_group as $circles) {
            foreach ($circles as $circle) {
                $item = [];
                $item['user'] = User::where('id', $circle->user_id)->first();
                $item['friends'][] = User::where('id', $circle->friend_id)->first();
            }
            $data[] = $item;
        }


        dd($data);

        // dd($users->circles->users->name);
        return  view('admin.circle', compact('circles', 'users'));

    }
}
