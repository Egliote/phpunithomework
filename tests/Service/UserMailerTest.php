<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Service\HappyNumberGenerator;
use App\Service\Mailer;
use App\Service\UserMailer;
use PHPUnit\Framework\TestCase;

class UserMailerTest extends TestCase
{
    public function testSendHello()
    {
        $mailer=$this->createMock(Mailer::class);
        $mailer->expects($this->once())
            ->method('send')
            ->with('vardenis@takas.lt', 'Hello Vardenis. Your happy number is: 2');

        $happyNumberGenerator= $this->createMock(HappyNumberGenerator::class);
        $happyNumberGenerator->expects($this->any())
            ->method('generate')
            ->willReturn(2);

        $user=new User();
        $user->setName('Vardenis');
        $user->setEmail('vardenis@takas.lt');
        $service=new UserMailer($mailer, $happyNumberGenerator);
        $service->sendHello($user);
    }
}