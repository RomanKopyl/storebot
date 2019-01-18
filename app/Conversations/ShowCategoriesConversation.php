<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use App\Category;

class ShowCategoriesConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    // public function askCategory()
    // {
    //     $question = Question::create('Товари якої категорії хочете переглянути?')
    //         ->callbackId('3Question')
    //         ->addButtons([$this->addButtons()]);

    //     $this->ask($question, function (Answer $answer) {
    //         if ($answer->isInteractiveMessageReply()) {
    //             foreach ($products as $product) {
    //                 if ($answer->getValue() === $product->category) {
    //                     $this->bot->startConversation(new ShowProductByConversation());
    //                 }
    //             }
    //         }
    //     });
    // }

    // // protected function addProduct($category)
    // // {
    // //     $products = Product::all();
    // //     $productsFound = [];

    // //     foreach ($products as $product) {
    // //         if ($product->category === ) {
    // //             array_push($productsFound, $product);

    // //             $image = $product->photo;
    // //             $text = $product->name.PHP_EOL.' - '.$product->price.' грн'
    // //                                 .PHP_EOL.$product->description;

    // //             $this->addScreen($image, $text);
    // //         }
    // //     }

    // //     $categorius = Category::all();
    // //     $buttons = [];
    // //     foreach ($categorius as $category) {
    // //         $buttons[] = Button::create($category->name)->value($category->name);
    // //     }

    // //     return $buttons;
    // // }

    // protected function addButtons()
    // {
    //     $categorius = Category::all();
    //     $buttons = [];
    //     foreach ($categorius as $category) {
    //         $buttons[] = Button::create($category->name)->value($category->name);
    //     }

    //     return $buttons;
    // }

    public function run()
    {
        // $this->askCategory();
        $categorius = Category::all();
        foreach ($categorius as $category) {
            $this->say($category->name.PHP_EOL);
        }
    }
}
