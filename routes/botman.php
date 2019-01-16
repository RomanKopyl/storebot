<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello, My Lord!');
});
// $botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('([/\w\sа-я]+)', BotManController::class.'@startConversation');
