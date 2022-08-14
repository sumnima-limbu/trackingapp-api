<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Circle;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CircleController extends Controller
{
    public function index()
    {
        try {
            $circle = Circle::where('user_id', Auth::id())->orWhere('friend_id', Auth::id())
                ->get();

            $data = [];
            foreach ($circle as $item) {
                $item['user'] = User::find($item->user_id);
                $item['friend'] = User::find($item->friend_id);
                $data[] = $item;
            }

            $response = [
                'success' => true,
                'data' => $data
            ];

            return response($response, 200);
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
                'success' => false
            ];

            return response($response, 500);
        }
    }

    public function request(Request $request)
    {
        try {

            // Return if user doesn't exist
            $user = User::where('email', $request->get('email'))->first();

            if (!$user) {
                $response = [
                    'message' => 'User doesn\'t exists.',
                    'success' => false
                ];

                return response($response, 400);
            }


            // Return if already in circle
            $friend = Circle::where('user_id', Auth::id())
                ->where('friend_id', $user->id)
                ->first();

            if ($friend) {
                $response = [
                    'message' => 'Already sent to join circle.',
                    'success' => false
                ];

                return response($response, 400);
            }

            // Send request and Notification
            Circle::create([
                'user_id' => Auth::id(),
                'friend_id' => $user->id,
                'status' => 1
            ]);

            Notification::create([
                'from_id' => Auth::id(),
                'to_id' => $user->id,
                'type' => 'circle',
                'message' => "I have added you to my circle."
            ]);

            $response = [
                'message' => 'Requested to join circle',
                'success' => true
            ];

            return response($response, 200);
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
                'success' => false
            ];

            return response($response, 500);
        }
    }

    public function confirm(Request $request)
    {
        // will implement this feature sometime later
        // for now status will set to one in the time of request itself
        try {
            $circle = Circle::where('user_id', $request->get('user_id'))
                ->where('friend_id', Auth::id())
                ->first();

            $circle->status = 1;
            $circle->save();

            $response = [
                'message' => 'Added to circle',
                'success' => true
            ];

            return response($response, 200);
        } catch (\Exception $e) {

            $response = [
                'message' => 'Added to circle.',
                'success' => false
            ];

            return response($response, 500);
        }
    }

    public function notify()
    {
        // will implement this feature sometime later
        // for now status will set to one in the time of request itself
        try {
            $friend_ids = Circle::where('user_id', Auth::id())
                ->pluck('friend_id');

            foreach ($friend_ids as $id) {
                Notification::create([
                    'from_id' => Auth::id(),
                    'to_id' => $id,
                    'type' => 'stress',
                    'message' => 'I might be in trouble. Here is my location.',
                ]);

                $this->sendSMS(User::where('id', $id)->first());
            }


            $response = [
                'message' => 'Notified Circle',
                'success' => true
            ];

            return response($response, 200);
        } catch (\Exception $e) {

            $response = [
                'message' => $e->getMessage(),
                'success' => false
            ];

            return response($response, 500);
        }
    }

    public function sendSMS($user)
    {
        if (!$user) return;

        $sid = 'ACb5e373253ea419e6cdf46d447ee72fac';
        $token = '1f6218335ec4484e4d3e4c4c3f8001bd';
        $twillo_number = '+19093183540';

        // temp phone numbers
        $phone_numbers = ['+9779804018923'];

        foreach ($phone_numbers as $phone_number) {
            $client = new \Twilio\Rest\Client($sid, $token);
            $message = $client->messages->create(
                $phone_number, // Text this number
                [
                    'from' => $twillo_number, // From a valid Twilio number
                    'body' => 'I might be in trouble. I have sent my last location in findmeapp'
                ]
            );
        }
    }
}

