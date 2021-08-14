<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi|Hola', function ($bot) {
    $bot->reply($bot->getUser()->getId());
    $bot->reply('Hola humanoide');
});
$botman->hears('conversar', BotManController::class.'@startConversation');
$botman->hears('matematicas', BotManController::class.'@startOperations');
$botman->hears('interactivo', BotManController::class.'@startInteractive');
