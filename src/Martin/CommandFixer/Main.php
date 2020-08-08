<?php

declare(strict_types=1);

namespace Martin\CommandFixer;

use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommandEvent(CommandEvent  $ev): void {
        $args = explode(" ", $ev->getCommand());
        $command = strtolower(array_shift($args));
        $ev->setCommand($command . " " . join(" ", $args));
    }
}
