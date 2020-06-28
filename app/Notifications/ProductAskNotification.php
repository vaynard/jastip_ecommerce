<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\ProductAsk;

class ProductAskNotification extends Notification
{
    use Queueable;

    protected $ask_product;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ProductAsk $ask_product)
    {
        $this->ask_product = $ask_product;
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
            'id' => $this->ask_product->product->id,
            'name' => $this->ask_product->user->name,
            'notification_data' => $this->ask_product->user->name." telah bertanya seputar barang anda : ". $this->ask_product->product->product_name,
            'url' => "product/detail/" .$this->ask_product->product->id,
        ];
    }
}
