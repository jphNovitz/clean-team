<?php

namespace App\Model;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

interface CTMessenger{
    public  function sendEmail($from, $to, $subject, $nameFrom);
}