<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\ConfirmPayment;

class ConfirmPaymentNotification extends Notification
{
    use Queueable;

    protected $confirm_payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ConfirmPayment $confirm_payment)
    {
        $this->confirm_payment = $confirm_payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /*return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/
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
            'id' => $this->confirm_payment->order->id,
            'name' => $this->confirm_payment->order->user->name,
            'notification_data' => $this->confirm_payment->order->user->name."telah mengkonfirmasi pembayaran untuk Order ID ". $this->confirm_payment->order->order_id,
            'url' => "account/my-order/" .$this->confirm_payment->order->id,
        ];
    }
}
