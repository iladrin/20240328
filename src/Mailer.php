<?php

namespace App;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use \Symfony\Component\Mailer\MailerInterface as BaseMailer;
use Symfony\Component\Mime\Email;
use Symfony\Contracts\Service\Attribute\Required;

class Mailer
{
    #[Required]
    public BaseMailer $mailer;

    public function __construct(#[Autowire(param: 'app.contact_email')] public string $appContactEmail)
    {
    }

    public function sendMessageToContact(string $emailAddress, string $message): void
    {
        $email = (new Email())
            ->from($emailAddress)
            ->to($this->appContactEmail)
            ->subject('Contact')
            ->html($message);
        $this->mailer->send($email);
    }

}