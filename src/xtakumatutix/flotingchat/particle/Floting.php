<?php
namespace xtakumatutix\flotingchat\particle;

use pocketmine\Player;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\plugin\Plugin;
use pocketmine\scheduler\ClosureTask;
use pocketmine\Server;

class Floting
{
    public static function particle(Player $player, $data)
    {
        $basePos = $player->asVector3();
        $basePos = $basePos->add(0, 1, 0);//高さ上げ
        switch ($player->getDirection()) {
            case 3:
                $pos = $basePos->add(1, 0, 0);
                break;
            case 0:
                $pos = $basePos->add(0, 0, 1);
                break;
            case 1:
                $pos = $basePos->add(-1, 0, 0);
                break;
            case 2:
                $pos = $basePos->add(0, 0, -1);
                break;
            }
        $level = $player->getLevel();
        $name = $player->getName();
        $particle = new FloatingTextParticle($pos, "§7by.{$name}", "{$data[0]}");
        $level->addParticle($particle);

        $task = new ClosureTask(function (int $currentTick) use ($particle, $level): void {
            $particle->setInvisible(true);//パーティクルを見えなくする(これ以外に消す方法あるかも)
            $level->addParticle($particle);//見えなくしたのを反映させる
        });
        $plugin = Server::getInstance()->getPluginManager()->getPlugin("reaction");
        /** @var Plugin $plugin */
        $plugin->getScheduler()->scheduleDelayedTask($task, 20 * ($data[1] + 1) * 5);//時間指定×20(1秒)×5(スライドバー)※0からだから+1する
    }
}
