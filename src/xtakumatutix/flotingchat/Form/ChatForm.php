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
            Floting::particle($player,$data);
            return;
        }

    public function jsonSerialize()
    {
        return [
            'type' => 'custom_form',
            'title' => '浮き文字',
            'content' => [
                [
                    'type' => 'input',
                    'text' => 'aaaaa'
                ]
            ]
        ];
    }
}