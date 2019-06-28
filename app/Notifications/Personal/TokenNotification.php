<?php

namespace App\Notifications\Personal;

use App\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TokenNotification extends Notification
{
    use Queueable;
    /**
     * @var string
     */
    private $token;

    /**
     * Create a new notification instance.
     *
     * @param Token $token
     */
    public function __construct(Token  $token)
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
            ->subject("Invitation d'inscription")
            ->greeting("Bonjour")
            ->line("vous être invité a s'inscrire")
            ->action("Inscription", route('token.edit',['token' => $this->token->id]))
            ->line("Ce message vous a été envoyer suite a l'indiccation de votre adresse de l'un de nos modérateurs ")
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
