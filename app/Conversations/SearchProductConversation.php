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
        $productSought = '';
        $productsFound = [];

        $this->ask('Введіть назву товару', function (Answer $answer) use ($productsFound) {
            $productSought = $answer->getText();
            $products = Product::all();

            //we show found products on screen
            foreach ($products as $product) {
                if (stripos($product->name, $productSought) !== false) {
                    array_push($productsFound, $product);

                    $image = $product->photo;
                    $text = $product->name.PHP_EOL.' - '.$product->price.' грн'
                                        .PHP_EOL.$product->description;

                    $this->addScreen($image, $text);
                }
            }

            // if goods are found, add the buy button, otherwise we ask whether to continue the search

            if (!empty($productsFound)) {
                $this->addBuyButton($productsFound);
            } else {
                $this->askContinue();
            }
        });
    }

    public function addScreen($image, $text)
    {
        $attachment = new Image($image);

        $message = OutgoingMessage::create($text)
                        ->withAttachment($attachment);

        $this->say($message);
    }

    public function addBuyButton($productsFound)
    {
        $question = Question::create('Натисніть на товар, який хочете придбати.')
            ->callbackId('4Question')
            ->addButtons($this->addButtons());

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
        $buttons = [];
        foreach ($productsFound as $product) {
            $buttons[] = Button::create($product->name)->value($product->name);
        }

        return $buttons;
    }

    public function askContinue()
    {
        $question = Question::create('Товарів не знайдено. Бажаєте продовжити пошук?')
            ->callbackId('secondQuestion')
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

    // public function addProduct($product)
    // {
//     $cart->user_id = User::where('user_id', $user_id)->first();
//     $cart->products = Product::where('product', $product)->first();
//     $cart->amount += Product::where('price', $price)->first();
//     $user->save();

//     $this->say($product->name.'додано до кошика');
    // }

    public function run()
    {
        $this->searchProduct();
    }
}

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
