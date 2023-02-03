<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DriverNotification extends Notification
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
            ->line('You’ve been assigned a new ride.')
            ->line('Pick-up Date/Time: ' . getDateByFormat($this->booking->pickup_date) . ' (' . getTimeByFormat($this->booking->pickup_time) . ')')
            ->line('Pick-up Location: ' . $this->booking->pickup_location)
            ->line('Drop-off Location: ' . $this->booking->drop_location)
            ->line('Customer Name: ' . $this->booking->first_name . ' ' . $this->booking->last_name)
            ->line('Customer Contact: ' . $this->booking->phone)
            ->line('Thank you for using our services!');
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
