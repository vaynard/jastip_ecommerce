<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\ProductAskReply;

class ProductAskReplyNotification extends Notification
{
    use Queueable;


    protected $product_ask_reply;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        ProductAskReply $product_ask_reply
    )
    {
        $this->product_ask_reply = $product_ask_reply;
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
            'id' => $this->product_ask_reply->product_ask->id,
            'name' => $this->product_ask_reply->product_ask->user->name,
            'notification_data' => $this->product_ask_reply->product_ask->product->user->name." telah menjawab pertanyaan anda terkait barang ". $this->product_ask_reply->product_ask->product->product_name,
            'url' => "product/detail/" .$this->product_ask_reply->product_ask->product->id,
        ];
    }
}
