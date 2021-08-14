<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use App\Values\Interactive;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;


class Interactives extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    private function askInteractive(){
        $question=Question::create('Que deseas hacer?')
        ->fallback('No se pudo responder :c')
        ->callbackId('ask_reason')
        ->addButtons([
            Button::create('Nuevo Producto')->value('0'),
            Button::create('Preguntas')->value('1'),
            Button::create('Ver Video')->value('2'),
            Button::create('Validacion')->value('3'),
        ]);

        return $this->ask($question,function(Answer $answer){
            if($answer->isInteractiveMessageReply()){
                $content = Interactive::getStrategy($answer->getValue());
                $this->getBot()->startConversation(new $content());
            }
        });
    }
    public function run()
    {
        $this->askInteractive();
    }

}
