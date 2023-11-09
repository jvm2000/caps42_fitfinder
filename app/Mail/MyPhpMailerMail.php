<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyPhpMailerMail extends Mailable
{
    use SerializesModels;

    public $subject;
    public $message;
    public $to;
    public $toName;

    public function __construct($subject, $message, $to, $toName)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->to = $to;
        $this->toName = $toName;
    }

    public function build()
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = config('phpmailer.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('phpmailer.username');
            $mail->Password = config('phpmailer.password');
            $mail->SMTPSecure = config('phpmailer.encryption');
            $mail->Port = config('phpmailer.port');

            $mail->setFrom(config('phpmailer.from.address'), config('phpmailer.from.name'));

            $mail->addAddress($this->to, $this->toName);
            $mail->isHTML(true);
            $mail->Subject = $this->subject;
            $mail->Body = $this->message;

            $mail->send();
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}