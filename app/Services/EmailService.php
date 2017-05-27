<?php

namespace App\Services;

use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Password;

class EmailService
{
    private $mail;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
    }

    public function welcomeNewUsers($user)
    {
        $this->mail->send(
            'emails.welcome',
            ['name' => $user->name],
            function ($m) use ($user) {
                $m->to($user->email)->subject('Welcome');
            }
        );
    }

    public function resetPassword($email)
    {
        Password::broker()->sendResetLink(['email' => $email]);
    }
}