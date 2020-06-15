<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;

require_once('OnboardingConversation.php');
require_once('OnboardingConversation2.php');


$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));


$botman->hears('1', function ($bot) {
    $bot->startConversation(new OnboardingConversation2);
});
$botman->hears('2', function ($bot) {
    $bot->startConversation(new OnboardingConversation);
});
$botman->hears('3', function ($bot) {
    $bot->startConversation(new OnboardingConversation3);
});



$botman->listen();
?>