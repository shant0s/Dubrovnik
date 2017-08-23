<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('email_help')) {

    function email_help($to, $subject, $msg, $from, $attachments = '') {
        require_once APPPATH . 'third_party/swiftmailer/lib/swift_required.php';

        if (ENVIRONMENT == 'development') {
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                    ->setUsername(SWIFT_EMAIL)
                    ->setPassword(SWIFT_PASS);
        } else if (ENVIRONMENT == 'testing') {
            $transport = Swift_SmtpTransport::newInstance('lv-shared03.cpanelplatform.com', 465, 'ssl')
                    ->setUsername('demo@workupdate.net')
                    ->setPassword('c0redreams1984');
        } else if (ENVIRONMENT == 'production') {
            $transport = Swift_MailTransport::newInstance('', 465, 'tls');
        }

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance($subject)
                ->setFrom($from)
                ->setTo($to)
                ->setBody($msg, 'text/html');

        if ($attachments) {
            foreach ($attachments as $k => $v) {
                $message->attach(Swift_Attachment::newInstance($v, $k . '.pdf', 'application/pdf'));
            }
        }
//debug($message);
        $is_sent = $mailer->send($message);

        return $is_sent ? true : false;
    }

}