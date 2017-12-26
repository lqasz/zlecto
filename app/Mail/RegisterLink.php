<?php

namespace Laraspace\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterLink extends Mailable
{
    use Queueable, SerializesModels;

    private $first_name;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $token)
    {
        $this->first_name = $first_name;
        $this->url = 'http://10.40.10.10/register/'. $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('index.sessions.partials.regiser-link')->with([
                'first_name' => $this->first_name,
            ])->subject("Prosimy o zweryfikowanie adresu email.");
    }
}
