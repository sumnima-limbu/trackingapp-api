<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.user', compact('users'));
    }

    public function create(Request $request) {
        return view('admin.addUser');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|min:10',
            'password' => 'required|string|confirmed',
        ]);


        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'date_of_birth' => $fields['date_of_birth'],
            'phone_number' => $fields['phone_number'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        if($user) {
            return back()->with('success', 'User created Successfully');
        }
        else {
            return back()->with('fail', 'Something went wrong. Try again later');
        }
    }

    public function destroy(Request $request) {

        User::find($request->id)->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully');
    }
}
