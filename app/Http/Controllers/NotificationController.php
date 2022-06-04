<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Circle;
use App\Models\Notification;
use App\Models\Location;

class NotificationController extends Controller
{
    public function index()
    {
        try {

            $notifications = Notification::where('to_id', Auth::id())->latest()->get();

            $data = [];
            foreach ($notifications as $item) {
                $item['from'] = User::find($item->from_id);
                $item['to'] = User::find($item->to_id);

                if ($item['type'] === 'stress') {
                    $locations = Location::where('user_id', $item->from_id)->latest()->limit(50)->get();
                    $item['locations'] = $locations;
                }

                $data[] = $item;
            }

            $response = [
                'success' => true,
                'data' => $data
            ];

            return response($response, 200);
        } catch (\Exception $e) {

            $response = [
                'message' => 'Something went wrong',
                'success' => false
            ];

            return response($response, 500);
        }
    }

    public function create(Request $request)
    {
        try {

            if ($request->get('type') === 'stress') {
                $circle = Circle::where('user_id', Auth::id())
                    ->where('status', 1)
                    ->get();

                foreach ($circle as $item) {
                    Notification::create([
                        'from_id' => Auth::id(),
                        'to_id' => $item->friend_id,
                        'type' => 'stress',
                        'message' => 'I am in emergency please help. Here\'s my location.'
                    ]);
                }
            }

            $response = [
                'message' => 'Created stress notification',
                'success' => true
            ];

            return response($response, 200);
        } catch (\Exception $e) {

            $response = [
                'message' => 'Something went wrong',
                'success' => false
            ];

            return response($response, 500);
        }
    }
}
