<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        $data = ['LoggedUserInfo'=>Admin::where('id', '=', session('LoggedUser'))->first()];
        return view('admin.index', $data);
    }
}
