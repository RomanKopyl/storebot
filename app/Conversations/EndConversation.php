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
        $this->say('Дякуємо за звернення.'.PHP_EOL
            .'Ви завжди можете зателефонувати нам за номером +38(097)555-55-55'.PHP_EOL
            .'або знайти наші товари на сайті www.beststore.com'.PHP_EOL
            .'Гарного вам дня.');
    }
}
