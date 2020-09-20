<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccessLevelChanged extends Notification
{
    use Queueable;

    protected $notifiable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notifiable)
    {
        $this->notifiable = $notifiable;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject('Access Level Changed.')
            ->greeting('Hi '.$this->notifiable->name.',')
            ->line('Congratulations. Your access level has been updated to **'.$this->getAccessLevelString($this->notifiable->access_level).'**')
            ->line('')
            ->line('*Have questions? Contact the administrator for further information*');
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

    private function getAccessLevelString($accessLevel){
        switch($accessLevel){
            case 1:
                return "Super Admin";

            case 2:
                return "Editor";

            case 3:
                return "Author";

            default:
                return "";
        }
    }
}
