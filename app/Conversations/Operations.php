<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Values\Operator;

class Operations extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    private function askOperations(){
        $question=Question::create('Que concepto deseas recordar?')
        ->fallback('No se pudo responder :c')
        ->callbackId('ask_reason')
        ->addButtons([
            Button::create('suma')->value('S'),
            Button::create('resta')->value('R'),
            Button::create('multiplicacion')->value('M'),
            Button::create('division')->value('D'),
        ]);

        return $this->ask($question,function(Answer $answer){
            if($answer->isInteractiveMessageReply()){
                $content = Operator::getStrategy($answer->getValue());
                $this->say((new $content)->process());
            }
        });
    }
    public function run()
    {
        $this->askOperations();
    }
}
