<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Deposit;

class DepositSubmitted extends Notification
{
    use Queueable;

    protected $deposit;

    /**
     * Create a new notification instance.
     */
    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->deposit->id,
            'message' => 'A new deposit has been submitted.',
            'user_id' => $this->deposit->user_id,
            'amount' => $this->deposit->amount,
            'trx_id' => $this->deposit->trx_id,
            'status' => $this->deposit->status,
            'created_at' => $this->deposit->created_at,
        ];
    }
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->deposit->id,
            'message' => 'A new deposit has been submitted.',
            'user_id' => $this->deposit->user_id,
            'amount' => $this->deposit->amount,
            'trx_id' => $this->deposit->trx_id,
            'status' => $this->deposit->status,
            'created_at' => $this->deposit->created_at,
        ];
    }
}
