<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class CustomDatabaseChannel 
{

  public function send($notifiable, Notification $notification)
  {
    $data = $notification->toDatabase($notifiable);

    return $notifiable->routeNotificationFor('database')->create([
        'id' => $notification->id,

        //customize here
        'from' => $data['user']['id'],
        'to' => $data['user_to']['id'],
        'helpdesk_id' => !empty($data['helpdesk']['id']) ? $data['helpdesk']['id'] : null,
        'type' => method_exists($notification, 'databaseType')
                    ? $notification->databaseType($notifiable)
                    : get_class($notification),
        'data' => $data,
        'read_at' => null,
    ]);
  }

}