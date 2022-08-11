<?php

namespace App\Http\Controllers\admin;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::all();

        return view('admin.notification', compact('notifications', $notifications));
    }
}
