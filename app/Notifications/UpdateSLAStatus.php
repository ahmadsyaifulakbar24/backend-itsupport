<?php

namespace App\Notifications;

use App\Models\HelpdeskStep;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateSLAStatus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $helpdesk_step, $updated_by, $user_to;
    public function __construct(HelpdeskStep $helpdesk_step, User $updated_by, User $user_to)
    {
        $this->afterCommit();

        $this->helpdesk_step = $helpdesk_step;
        $this->updated_by = $updated_by;
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
        return ['database', 'broadcast'];
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
            'user_from' => [
                'id' => $this->updated_by->id,
                'name' => $this->updated_by->name
            ],
            'user_to' => [
                'id' => $this->user_to->id,
                'name' => $this->user_to->name
            ],
            'helpdesk_step' => [
                'id' => $this->helpdesk_step->id,
                'helpdesk_id' => $this->helpdesk_step->helpdesk->helpdesk_id,
                'helpdesk_title' => $this->helpdesk_step->helpdesk->title,
                'ticket_number' => $this->helpdesk_step->helpdesk->ticket_number,
            ],
            'notification_type' => 'update sla status'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'user_from' => [
                'id' => $this->updated_by->id,
                'name' => $this->updated_by->name
            ],
            'user_to' => [
                'id' => $this->user_to->id,
                'name' => $this->user_to->name
            ],
            'helpdesk_step' => [
                'id' => $this->helpdesk_step->id,
                'status' => $this->helpdesk_step->status,
                'name' => $this->helpdesk_step->service_category_step->name,
                'helpdesk_id' => $this->helpdesk_step->helpdesk->id,
                'helpdesk_title' => $this->helpdesk_step->helpdesk->title,
                'ticket_number' => $this->helpdesk_step->helpdesk->ticket_number,
            ],
            'notification_type' => 'update sla status'
        ]);
    }
}
