<?php
namespace App\Strategies\Interactives;
use App\Conversations\Interactives;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class Img extends Conversation implements IStrategy{
    public function run(){
        $attachment=new Image('https://images.unsplash.com/photo-1622495894289-f47b79f0836c?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        $response= OutgoingMessage::create('este es mi nuevo producto')
        ->withAttachment($attachment);
        $this->say($response);
    }
}