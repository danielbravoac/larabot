<?php
namespace App\Strategies\Interactives;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Validate extends Conversation implements IStrategy{
    public function run(){
        $this->ask('Escribe lo que deseas saber hora o fecha',[
            [
                'pattern'=>'hora|hh|h',
                'callback'=>function(){
                    $this->say(date('H:i:s'));
                }
            ],
            [
                'pattern'=>'fecha|f|fe',
                'callback'=>function(){
                    $this->say(date('d/m/Y'));
                }
            ],
        ]);

    }
}