<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class MapController extends Controller
{
    public function index() {

        /* Static IP address */
        $ip = '192.168.1.73';
        $currentUserInfo = Location::get($ip);
        
        return view('admin.maps', compact('currentUserInfo'));
    }
}
