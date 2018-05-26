<?php

namespace App\Service;

use App\Entity\User;

class UserMailer
{
    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * @var HappyNumberGenerator
     */
    private $happyNumberGenerator;


    public function __construct(Mailer $mailer, HappyNumberGenerator $happyNumberGenerator)
    {
        $this->mailer = $mailer;
        $this->happyNumberGenerator=$happyNumberGenerator;
    }

    public function sendHello(User $user)
    {
        $body = sprintf('Hello %s.', $user->getName());
        $body =$body.' Your happy number is: ' . $this->happyNumberGenerator->generate();

            $this->mailer->send($user->getEmail(), $body);
    }
}
