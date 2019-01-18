<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\Category;
use App\Product;

class ShowCategoriesConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function askCategory()
    {
        $question = Question::create('Товари якої категорії хочете переглянути?')
            ->callbackId('3Question')
            ->addButtons($this->addButtons());

        $this->ask($question, function (Answer $answer) {
            $categories = Category::all();
            if ($answer->isInteractiveMessageReply()) {
                foreach ($categories as $category) {
                    if ($answer->getValue() === $category->name) {
                        // $this->say($category->name);
                        $this->addProducts($category);
                        // $this->bot->startConversation(new ShowProductByConversation());
                    }
                }
            }
        });
    }

    protected function addProducts($category)
    {
        $productsFound = $category->products;
        // $this->say($category->name);

        foreach ($productsFound as $product) {
            // array_push($productsFound, $product);

            $image = $product->photo;
            $text = $product->name.PHP_EOL.' - '.$product->price.' грн'
                                .PHP_EOL.$product->description;

            $this->addScreen($image, $text);
        }
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
        // $categorius = Category::all();
        // foreach ($categorius as $category) {
        //     $this->say($category->name.PHP_EOL);
        // }
    }
}
