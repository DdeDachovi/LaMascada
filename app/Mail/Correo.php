<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Correo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $nombre;
    public $asunto;
    public $correo;
    public $descripcion;
    public function __construct($nombre,$asunto,$correo,$descripcion)
    {
        $this->nombre = $nombre;
        $this->asunto = $asunto;
        $this->correo = $correo;
        $this->descripcion = $descripcion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('comercialgng.adm@gmail.com',$this->nombre)
                    ->view('Contacto.mail')
                    ->subject($this->asunto)
                    ->with($this->descripcion,$this->correo);
    }
}
