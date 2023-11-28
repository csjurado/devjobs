<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($vacante_id,$nombre_vacante,$usuario_id,)
    {
        //
        $this->vacante_id=$vacante_id;
        $this->nombre_vacante= $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/candidatos/'.$this->vacante_id);

        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es : '.$this->nombre_vacante)
                    ->action('Ver Notificaciones',$url )
                    ->line('Gracias por utilizar DevJobs');
    }

    // Almaena las notificaciones en la base de datos
    public  function toDatabase ($notifiable){
        return [
            'id_vacante'=> $this->vacante_id,
            'nombre_vacante'=>$this->nombre_vacante,
            'usuario_id'=>$this->usuario_id,
        ];
    }

}