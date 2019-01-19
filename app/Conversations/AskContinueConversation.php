<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class AskContinueConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function askContinue()
    {
        $question = Question::create('Бажаєте продовжити пошук?')
            ->callbackId('askContinue')
            ->addButtons([
                Button::create('Так')->value('InitiatoryConversation'),
                Button::create('Іншим разом')->value('refuse'),
            ]);
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'InitiatoryConversation') {
                    $this->bot->startConversation(new InitiatoryConversation());
                } else {
                    $this->bot->startConversation(new EndConversation());
                }
            }
        });
    }

    public function run()
    {
        $this->askContinue();
    }
}
