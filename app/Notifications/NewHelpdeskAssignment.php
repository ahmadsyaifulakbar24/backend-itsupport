<?php

namespace App\Notifications;

use App\Models\HelpdeskAssigment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewHelpdeskAssignment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $helpdesk_assignment, $assignment_from, $user_to;
    public function __construct(HelpdeskAssigment $helpdesk_assignment, User $assignment_from, User $user_to)
    {
        $this->afterCommit();

        $this->helpdesk_assignment = $helpdesk_assignment;
        $this->assignment_from = $assignment_from;
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
                'id' => $this->assignment_from->id,
                'name' => $this->assignment_from->name
            ],
            'user_to' => [
                'id' => $this->user_to->id,
                'name' => $this->user_to->name
            ],
            'helpdesk_assignment' => [
                'id' => $this->helpdesk_assignment->id,
                'helpdesk_id' => $this->helpdesk_assignment->helpdesk_id,
                'helpdesk_title' => $this->helpdesk_assignment->helpdesk->title,
                'ticket_number' => $this->helpdesk_assignment->helpdesk->ticket_number,
            ],
            'notification_type' => 'create helpdesk assignment'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'user_from' => [
                'id' => $this->assignment_from->id,
                'name' => $this->assignment_from->name
            ],
            'user_to' => [
                'id' => $this->user_to->id,
                'name' => $this->user_to->name
            ],
            'helpdesk_assignment' => [
                'id' => $this->helpdesk_assignment->id,
                'helpdesk_id' => $this->helpdesk_assignment->helpdesk_id,
                'helpdesk_title' => $this->helpdesk_assignment->helpdesk->title,
                'ticket_number' => $this->helpdesk_assignment->helpdesk->ticket_number,
            ],
            'notification_type' => 'create helpdesk assignment'
        ]);
    }
}
