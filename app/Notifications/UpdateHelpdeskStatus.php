<?php

namespace App\Notifications;

use App\Models\Helpdesk;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateHelpdeskStatus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $helpdesk, $updated_by, $user_to;
    public function __construct(Helpdesk $helpdesk, User $updated_by, User $user_to)
    {
        $this->afterCommit();

        $this->helpdesk = $helpdesk;
        $this->update_by = $updated_by;
        $this->user_to = $user_to;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomDatabaseChannel::class, 'broadcast'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user' => [
                'id' => $this->update_by->id,
                'name' => $this->update_by->name
            ],
            'user_to' => [
                'id' => $this->user_to->id,
                'name' => $this->user_to->name
            ],
            'helpdesk' => [
                'id' => $this->helpdesk->id,
                'status' => $this->helpdesk->status,
                'helpdesk_title' => $this->helpdesk->title,
                'ticket_number' => $this->helpdesk->ticket_number,
            ],
            'notification_type' => 'update helpdesk status'
        ];
    }

    public function toBroadcast($notifiable) {
        return new BroadcastMessage([
            'user' => [
                'id' => $this->update_by->id,
                'name' => $this->update_by->name
            ],
            'user_to' => [
                'id' => $this->user_to->id,
                'name' => $this->user_to->name
            ],
            'helpdesk' => [
                'id' => $this->helpdesk->id,
                'status' => $this->helpdesk->status,
                'helpdesk_title' => $this->helpdesk->title,
                'ticket_number' => $this->helpdesk->ticket_number,
            ],
            'notification_type' => 'update helpdesk status'
        ]);
    }
}
