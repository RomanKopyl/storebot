<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Product;
use Storage;

class AddBuyButtonConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function addBuyButton($productsFound)
    {
        // $productsFound = Storage::get('info.txt');
        $question = Question::create('Натисніть на товар, який хочете придбати.')
            ->callbackId('4Question')
            ->addButtons($this->addButtons($productsFound));

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                foreach ($productsFound as $product) {
                    if ($answer->getValue() === $product->name) {
                        $this->say($product->name);
                        // $this->addProducts($product);
                        // $this->bot->startConversation(new ShowProductByConversation());
                    }
                }
            }
        });
    }

    public function addButtons($productsFound)
    {
        // $productsFound = explode(' ', Storage::get('info.txt'));
        $buttons = [];
        foreach ($productsFound as $product) {
            $buttons[] = Button::create($product->name)->value($product->name);
        }

        return $buttons;
    }

    public function run()
    {
        $this->addBuyButton($productsFound);
    }
}
