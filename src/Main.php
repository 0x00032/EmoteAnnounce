<?php

declare(strict_types=1);

namespace Diverse\EmoteAnnounce;

use Diverse\EmoteAnnounce\Listener\EventListener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase {

    use SingletonTrait;

    public function onEnable(): void {
        self::setInstance($this);

        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }

}