<?php

namespace App\Service;

use App\Model\CTMessenger as CTMessengerAlias;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class CTMessenger implements CTMessengerAlias
{
    private $mailer ;

    public function __construct(MailerInterface $mailer){
        $this->mailer = $mailer;
    }

    public function sendEmail($from, $to, $subject, $nameFrom, $message)
    {

        $email = (new Email())
            ->from($from)
            ->to($to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($nameFrom.' vous a envoyé un message sur Clean Team')
            ->text($message)
            ->html('<p>'.$message.'</p>');

        try {
            $this->mailer->send($email);
            return true;
        } catch (\Exception $e){
            return false;
        }
    }

}