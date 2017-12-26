<?php

namespace Laraspace\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterLink extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name, $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $token)
    {
        $this->token = $token;
        $this->first_name = $first_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('index.sessions.partials.regiser-link')
            ->from("no-replay@zlec.to", "zlec.to")
            ->subject("Prosimy o zweryfikowanie adresu email.");
    }
}
