<?php
namespace App\Strategies\Interactives;

use App\Conversations\Interactives;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class Mp4 extends Conversation implements IStrategy{
    public function run(){
        $attachment=new Video('https://www.youtube.com/watch?v=ol86k8LHSQE',[
            'custom_payload'=>true
        ]);
        $response= OutgoingMessage::create('este es mi nuevo video')
        ->withAttachment($attachment);
        $this->say($response);
    }
}