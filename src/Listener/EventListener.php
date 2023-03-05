<?php

declare(strict_types=1);

namespace Diverse\EmoteAnnounce\Listener;

use Diverse\EmoteAnnounce\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerEmoteEvent;

class EventListener implements Listener {

    public function onPlayerEmoteEvent(PlayerEmoteEvent $event) {

        $config = Main::getInstance()->getConfig();
        $emote = $config->getNested("Emotes." . $event->getEmoteId());

        if($emote){
            $msg = str_replace("{player}", $event->getPlayer()->getName(), $config->getNested("Message"));
            $message = str_replace("{emote}", $emote, $msg);

            Main::getInstance()->getServer()->broadcastMessage($message);
        } else {
            Main::getInstance()->getLogger()->warning("Emoted ID: " . $event->getEmoteId() . " doesn't exist in config!");
        }

    }

}