<?php


namespace Hub;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class SetSpawnCommand extends Command {

    public function __construct() {
        parent::__construct("setspawn");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param string[] $args
     *
     * @return mixed
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if ($sender instanceof Player) {
            $currentLocation = $sender->getLocation();
            SpawnLocation::setSpawn($currentLocation);
            $sender->sendMessage("Spawn has set!");
        } else {
            echo "only for players!\n";
        }
    }

}