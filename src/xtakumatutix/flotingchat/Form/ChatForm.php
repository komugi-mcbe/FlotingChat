<?php
namespace xtakumatutix\flotingchat\Form;

use pocketmine\form\Form;
use pocketmine\Player;
use xtakumatutix\flotingchat\particle\Floting;

class ChatForm implements Form
{
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            return;
        }
        $length = mb_strlen($data[0]);
        if ($length == 0){
            $player->sendMessage("§c >> §f言葉を入力してください");
            if($length < 11){
                Floting::particle($player,$data);
                return;
                if($length > 12){
                    $player->sendMessage("§c >> §f文字は11字以内でしてください。");
                    return;
                }
            }
        }
    }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => '浮き文字',
            'content' => [
                [
                    'type' => 'input',
                    'text' => '浮き文字で入力したい言葉をうってください。'
                ],
                [
                    'type' => 'step_slider',
                    'text' => '何秒表示しますか？',
                    'steps' => ['5', '10', '15', '20', '25', '30'],
                    'default' => 0
                ]
            ]
        ];
    }
}