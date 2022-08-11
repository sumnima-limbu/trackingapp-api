<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index() {
        $data = ['LoggedUserInfo'=>Admin::where('id', '=', session('LoggedUser'))->first()];

        return view('admin.profile', $data);

        // Mail::send('emails.notification', function($message){
        //     $message->to('sumnimaklimbu@gmail.com', 'Sumnima')
        //     ->subject('Notification Sent');
        // });
    }

    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function save(Request $request) {
        // validate requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12'
        ]);

        //Insert data into database
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save) {
            return back()->with('success', 'New user has been successfully added to database');
        }else {
            return back()->with('fail', 'Something went wrong. try again later');
        }
    }

    public function check(Request $request) {
        //validate requests 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if(!$userInfo) {
            return back()->with('fail', 'We do not recognize your email address.');
        }else {
            //check password
            if(Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            } else {
                return back()->with('fail',"Incorrect password ! Please enter your correct password.");
            }
        }
    }

    public function logout() {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    // function settings() {
    //     $data = ['LoggedUserInfo'=>Admin::where('id', '=', session('LoggedUser'))->first()];
    //     return view('admin.settings', $data);
    // }

    

    // function staff() {
    //     $data = ['LoggedUserInfo'=>Admin::where('id', '=', session('LoggedUser'))->first()];
    //     return view('admin.staff', $data);
    // }
}
