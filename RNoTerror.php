<?php

/**
 * @name RNoTerror
 * @main RoMo\RNoTerror\RNoTerror
 * @author RoMo_Official
 * @version 1.0.0
 * @api 3.0.0
 */

namespace RoMo\RNoTerror;

use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\entity\ExplosionPrimeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class RNoTerror extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    //폭발방지
    public function onTNT(ExplosionPrimeEvent $event){
        $event->setCancelled();
    }
    //베드락 부숨
    public function onBreak(BlockBreakEvent $event){
        if($event->getBlock()->getId() == 26){
            if(!$event->getPlayer()->isOp()){
                $event->getPlayer()->kick("베드락 파괴", false);
                $this->getServer()->broadcastMessage("§b( §fDROP §b)§r {$event->getPlayer()->getName()}님이 베드락을 캐셨습니다.\n밴드에 해당 메세지를 캡쳐해 신고해주세요");
                return;
            }
        }
    }
}