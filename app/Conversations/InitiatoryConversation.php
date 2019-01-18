<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Storage;

class InitiatoryConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function firstQuestion()
    {
        $question = Question::create('Який товар вас цікавить?')
            ->callbackId('firstQuestion')
            ->addButtons([
                Button::create('Пошук за назвою')->value('searchProduct'),
                Button::create('Категорія')->value('showAllCategories'),
                Button::create('Іншим разом')->value('refuse'),
            ]);
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'searchProduct') {
                    $this->bot->startConversation(new SearchProductConversation());
                } elseif ($answer->getValue() === 'showAllCategories') {
                    $this->bot->startConversation(new ShowCategoriesConversation());
                } else {
                    $this->bot->startConversation(new EndConversation());
                    // $contents = Storage::get('info.txt');
                    // $this->say($contents);
                }
            }
        });
    }

    public function run()
    {
        $this->firstQuestion();
    }
}
