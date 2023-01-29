<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RideNotification extends Notification
{
    use Queueable;
    private $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
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
            ->subject('Ride Notification')
            ->greeting('Dear ' . $this->booking->first_name . ' ' . $this->booking->last_name . ',')
            ->line('Pickup Date: ' . getDateByFormat($this->booking->pickup_date))
            ->line('Pickup Time: ' . getTimeByFormat($this->booking->pickup_time))
            ->line('Driver Name: ' . $this->booking->driver->name)
            ->line('Driver Contact: ' . $this->booking->driver->phone)
            ->action('Orbit Limo - Premium Limo Services in Canada', url('https://orbitlimo.ca/'))
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
}
