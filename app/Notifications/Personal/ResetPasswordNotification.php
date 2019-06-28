<?php

namespace App\Notifications\Personal;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    /**
     * @var string $token
     */
    private $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {

        $this->token = $token;

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
            ->subject("Récuperation du Mot de passe")
            ->greeting("Bonjour")
            ->line("Suite a votre demande de reinitialisation du mot de passe de votre compte Tabibis")
            ->action("Modifié mon mot de passe", route('password.reset',['token' => $this->token]))
            ->line("Ce message vous a été envoyer suite a une tentative de Récuperation du Mot de passe!")
            ->salutation("Cordialement")
            ->salutation('LY');
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
