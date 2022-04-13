<?php

namespace App\Http\Controllers\API\v1\Notification;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\HelpdeskNotificationResource;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function get(Request $request)
    {
        $user = User::find($request->user()->id);
        $notification = $user->unreadNotifications();
        $result = [
            'notification' => HelpdeskNotificationResource::collection($notification->get()),
            'total' => $notification->count()
        ];
        return ResponseFormatter::success($result, 'success get notification data');
    }

    public function mark_as_read(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:notifications,id']
        ]);

        $user = User::find($request->user()->id);
        $user->notifications()->find($request->id)->markAsRead();

        return ResponseFormatter::success(null, 'success read notification');
    }

    public function delete(Request $request) 
    {
        $request->validate([
            'id' => ['required', 'exists:notifications,id']
        ]);

        $user = User::find($request->user()->id);
        $user->notifications()->find($request->id)->delete();

        return ResponseFormatter::success(null, 'success delete notification data');
    }
}
