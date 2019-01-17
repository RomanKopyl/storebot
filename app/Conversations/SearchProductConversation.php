<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use Storage;
use App\Product;
use App\User;
use App\Cart;

class SearchProductConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function searchProduct()
    {
        $products = Product::all();

        $this->say($products[1]->name);

        $image = $products[2]->photo;
        $text = $products[2]->description;
        $attachment = new Image($image);
        $message = OutgoingMessage::create($text)
                    ->withAttachment($attachment);

        $this->say($message);

        // foreach ($products as $product) {
        //     $contents = $product->name;
        //     $this->say($contents);

        //     $image = $product->photo;
        //     $attachment = new Image($image);

        //     $message = OutgoingMessage::create($text)
        //                 ->withAttachment($attachment);
        //     $this->say($message);

            // $text = $product->name.PHP_EOL.' - '.$product->price.' грн'
            //                 .PHP_EOL.$product->description;
            // $this->addScreen($image, $text);
        // }

        //     $productSought = '';

    //     $this->ask('Введіть назву товару', function (Answer $answer) {
    //         $chatId = $this->bot->getUser()->getId();
    //         $user = User::where('chat_id', $chatId)->first();
    //         $user->save();
    //         $productSought = $answer->getText();
    //         $this->bot->startConversation(new ConfirmationConversation());
    //     });

    //     $products = Product::all();
    //     $productsFound = '';

    //     foreach ($products as $product) {
    //         if (strpos($product, $productSought) !== false) {
    //             array_push($productsFound, $product);

    //             $image = $product->photo;
    //             $text = $product->name.PHP_EOL.' - '.$product->price.' грн'
    //                         .PHP_EOL.$product->description;

    //             $this->addScreen($image, $text, $name);
    //         }
    //     }

    //     $productAddCart = '';

    //     if (!empty($productsFound)) {
    //         $question = Question::create('Якщо товар вас зацікавав, додайте до кошика.')
    //                     ->callbackId('is_start_order')
    //                     ->addButtons([
    //                         // {
    //                         //     foreach ($productsFound as $product) {
    //                         //         $productAddCart = $product->name;
    //                         //         Button::create($productAddCart)->value($productAddCart),
    //                         //     }
    //                         // }
    //                         Button::create($productsFound[0])->value('addProduct'),
    //                         Button::create('Кошик')->value('Cart'),
    //                         Button::create('Поновити пошук')->value('newSearch'),
    //                     ]);
    //     }
    //     $this->ask($question, function (Answer $answer) {
    //         if ($answer->isInteractiveMessageReply()) {
    //             if ($answer->getValue() === 'addProduct') {
    //                 $this->addProduct($productsFound[0]);
    //             } elseif ($answer->getValue() === 'Cart') {
    //                 $this->bot->startConversation(new showCartConversation());
    //             } else {
    //                 $contents = Storage::get('info.txt');
    //                 $this->say($contents);
    //             }
    //         }
    //     });
    // }

    // public function addProduct($product)
    // {
    //     $cart->user_id = User::where('user_id', $user_id)->first();
    //     $cart->products = Product::where('product', $product)->first();
    //     $cart->amount += Product::where('price', $price)->first();
    //     $user->save();

    //     $this->say($product->name.'додано до кошика');
    // }

        // public function addScreen($image, $text)
        // {
        //     $attachment = new Image($image);

        //     $message = OutgoingMessage::create($text)
        //                 ->withAttachment($attachment);

        //     $this->say($message);
        // }
    }

    public function run()
    {
        $this->searchProduct();
    }
}
