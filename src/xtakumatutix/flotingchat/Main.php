<?php

namespace xtakumatutix\flotingchat;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use xtakumatutix\flotingchat\Form\ChatForm;
use xtakumatutix\flotingchat\particle\Floting;

Class Main extends PluginBase 
{

    public function onEnable() 
    {
        $this->getLogger()->notice("読み込み完了_ver.1.0.0");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if (!($sender instanceof Player)) {
            return true;
        }

        $sender->sendForm(new ChatForm());

        return true;
    }
}