<?php

namespace App\Notifications;

use App\Models\Withdrawl;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class WithdrawalStatusUpdated extends Notification
{
    use Queueable;

    protected $withdrawal;
    protected $message;

    public function __construct(Withdrawl $withdrawal, string $message = null)
    {
        $this->withdrawal = $withdrawal;
        $this->message = $message ?? $this->defaultMessage();
    }

    protected function defaultMessage()
    {
        return match ($this->withdrawal->status) {
            'processing' => 'Your withdrawal request has been approved and is now being processed.',
            'rejected'   => 'Your withdrawal request has been rejected.',
            default      => 'Your withdrawal status has been updated.',
        };
    }

    public function via($notifiable)
    {
        return ['database']; // or ['mail', 'database'] if you want email too
    }

    public function toDatabase($notifiable)
    {
        return [
            'withdrawal_id' => $this->withdrawal->id,
            'amount'        => $this->withdrawal->amount,
            'status'        => $this->withdrawal->status,
            'message'       => $this->message,
            'admin_note'    => $this->withdrawal->admin_note,
        ];
    }
}
