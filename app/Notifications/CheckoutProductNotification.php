<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\CheckoutProduct;

class CheckoutProductNotification extends Notification
{
    use Queueable;

    protected $checkout_product;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CheckoutProduct $checkout_product)
    {
        $this->checkout_product = $checkout_product;
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
        return null;
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
                'id' => $this->checkout_product->id,
                'name' => $this->checkout_product->product->user->name,
                'notification_data' => $this->checkout_product->checkout->user->name."telah menitip ".$this->checkout_product->product->product_name." dengan Order ". $this->checkout_product->checkout->order_id,
                'url' => "account/myproduct/detail/" .$this->checkout_product->product->id,
            ];
    }
}
