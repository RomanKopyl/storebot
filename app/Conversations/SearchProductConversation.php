<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\Product;

class SearchProductConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function searchProduct()
    {
        $productSought = '';
        $productsFound = [];

        $this->ask('Введіть назву товару', function (Answer $answer) use ($productsFound) {
            $productSought = $answer->getText();
            $products = Product::all();

            //show found products on screen
            foreach ($products as $product) {
                if (stripos($product->name, $productSought) !== false) {
                    array_push($productsFound, $product);

                    $image = $product->photo;
                    $text = $product->name.PHP_EOL.' - '.$product->price.' грн'
                                        .PHP_EOL.$product->description;

                    $this->addScreen($image, $text);
                }
            }

            if (empty($productsFound)) {
                $this->say('Товарів не знайдено');
            }

            $this->bot->startConversation(new AskContinueConversation());
        });
    }

    public function addScreen($image, $text)
    {
        $attachment = new Image($image);

        $message = OutgoingMessage::create($text)
                        ->withAttachment($attachment);

        $this->say($message);
    }

    public function run()
    {
        $this->searchProduct();
    }
}
