<?php

namespace App\Notifications;

use App\Models\Ulasan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UlasanBaruNotification extends Notification
{
    use Queueable;

    public $ulasan;

    public function __construct(Ulasan $ulasan)
    {
        $this->ulasan = $ulasan;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
{
    return (new \Illuminate\Notifications\Messages\MailMessage)
        ->from(config('mail.from.address'), $this->ulasan->nama)
        ->subject('Ulasan Baru dari Pengunjung')
        ->greeting('Halo Admin PKBM!')
        ->line('Ada ulasan baru dari pengunjung:')
        ->line('Nama: ' . $this->ulasan->nama)
        ->line('Email: ' . $this->ulasan->email)
        ->line('Telp.: ' . $this->ulasan->telp)
        ->line('Kritik & Saran: ' . $this->ulasan->kritik_saran)
        ->line('Terima kasih.')
        ->salutation('');
}
}