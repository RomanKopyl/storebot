<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class InitiatoryConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function firstQuestion()
    {
        $question = Question::create('Добрий день. Який товар вас цікавить?')
            ->callbackId('firstQuestion')
            ->addButtons([
                Button::create('Пошук за назвою')->value('serchProduct'),
                Button::create('Категорія')->value('showAllCategories'),
                Button::create('Іншим разом')->value('refuse'),
            ]);
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'serchProduct') {
                    $this->bot->startConversation(new SearchProductConversation());
                } elseif ($answer->getValue() === 'showAllCategories') {
                    $this->bot->startConversation(new ShowAllCategoriesConversation());
                } else {
                    $contents = Storage::get('info.txt');
                    $this->say($contents);
                }
            }
        });
    }

    public function run()
    {
        $this->firstQuestion();
    }
}
