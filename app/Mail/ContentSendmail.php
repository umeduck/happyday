<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContentSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $title;
    private $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->email = $inputs['email'];
        $this->title = $inputs['title'];
        $this->text = $inputs['text'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('example@gmail.com')
            ->subject('自動送信メール')
            ->view('contact.mail')
            ->with([
                'email' => $this->email,
                'title' => $this->title,
                'text'  => $this->text,
            ]);
    }
}
