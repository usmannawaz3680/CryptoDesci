<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WithdrawalRequested extends Notification
{
    protected $withdrawal;

    public function __construct($withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // or just 'database' if not sending email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Withdrawal Request')
            ->line("User {$this->withdrawal->user->name} requested a withdrawal of {$this->withdrawal->amount} {$this->withdrawal->coin->symbol}.")
            ->action('View Request', url("/admin/withdrawals/{$this->withdrawal->id}"));
    }

    public function toArray($notifiable)
    {
        return [
            'type'      => 'withdrawal',
            'user_id'   => $this->withdrawal->user_id,
            'amount'    => $this->withdrawal->amount,
            'coin'      => $this->withdrawal->coin->symbol,
            'address'   => $this->withdrawal->address,
            'id'        => $this->withdrawal->id,
        ];
    }
}
