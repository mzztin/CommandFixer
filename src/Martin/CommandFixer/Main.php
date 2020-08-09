<?php

namespace Martin\CommandFixer;

use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommandEvent(CommandEvent  $ev): void {
        $args = explode(" ", $ev->getCommand());
        $command = strtolower(array_shift($args));
        if (!$args) {
            $ev->setCommand($command);
            return;
        }
        $ev->setCommand($command . " " . join(" ", $args));
    }
}
