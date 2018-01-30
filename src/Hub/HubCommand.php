<?php


namespace Hub;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class HubCommand extends Command {

    /**
     * HubCommand constructor.
     */
    public function __construct() {
        parent::__construct("hub");
    }

    /**
     *
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param string[] $args
     *
     * @return mixed
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!($sender instanceof Player)) {
            $sender->sendMessage("Command only for player");
        } else {
            SpawnLocation::teleport($sender);
        }
    }

}