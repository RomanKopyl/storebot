<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class EndConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->say('Дякуємо за звернення. Гарного вам дня.');
    }
}
