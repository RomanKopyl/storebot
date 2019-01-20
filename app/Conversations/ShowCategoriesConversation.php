<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\Category;

class ShowCategoriesConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */

    //Show list of buttons-categories on screen
    public function askCategory()
    {
        $question = Question::create('Товари якої категорії хочете переглянути?')
            ->callbackId('askCategory')
            ->addButtons($this->addButtons());

        $this->ask($question, function (Answer $answer) {
            $categories = Category::all();
            if ($answer->isInteractiveMessageReply()) {
                foreach ($categories as $category) {
                    if ($answer->getValue() === $category->name) {
                        $this->addProducts($category);
                    }
                }
            }
        });
    }

    //Show list of products on screen && list of buy buttons of these products
    public function addProducts($category)
    {
        $productsFound = $category->products;

        foreach ($productsFound as $product) {
            $image = $product->photo;
            $text = $product->name.' - '.$product->price.' грн'
                                .PHP_EOL.$product->description;

            $this->addScreen($image, $text);
        }

        $this->bot->startConversation(new AskContinueConversation());
    }

    public function addScreen($image, $text)
    {
        $attachment = new Image($image);

        $message = OutgoingMessage::create($text)
                        ->withAttachment($attachment);

        $this->say($message);
    }

    protected function addButtons()
    {
        $categorius = Category::all();
        $buttons = [];
        foreach ($categorius as $category) {
            $buttons[] = Button::create($category->name)->value($category->name);
        }

        return $buttons;
    }

    public function run()
    {
        $this->askCategory();
    }
}
