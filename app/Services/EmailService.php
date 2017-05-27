<?php

namespace App\Services;

use \App\User;
use Illuminate\Mail\Mailer;

class EmailService
{
    private $mail;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    public function WelcomeNewUsers()
    {
        $user = new User;
        $user->signedUpThisWeek()->each(function ($user) {
            $this->mail->send(
                'emails.welcome',
                ['name' => $user->name],
                function ($m) use ($user) {
                    $m->to($user->email)->subject('Welcome');
                }
            );
        });
    }
}