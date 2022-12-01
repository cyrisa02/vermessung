<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class MailService
{
    /**
     * @var MailerInterface
     */
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(
        string $from,        
        string $htmlTemplate,
        array $context,        
        string $to ,        
        string $subject = 'Preisangebot',

    ): void {
        $email = (new TemplatedEmail())
            ->from($from)
            ->to($to)            
            ->subject($subject)
            ->htmlTemplate($htmlTemplate)
            ->context($context);

        $this->mailer->send($email);
    }
}