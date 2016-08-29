<?php
namespace Tournament;

/**
 * Class VikingFightingStrategy
 * @package Tournament
 */
class VikingFightingStrategy extends FightingStrategy
{
    /**
     * Swordsman fight Vs Viking
     * @param Fighter $fighter
     * @param $opponent
     */

     public function engage(Fighter $fighter, Fighter $opponent) {
         for ($vikingHitPoints = $opponent->totalHitPoints, $swordsmanHitPoints = $fighter->totalHitPoints ; ; ) {
             $vikingHitPoints -= $fighter->damage;
             $swordsmanHitPoints -= $opponent->damage;
             $fighter->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
             $opponent->currentHitPoints = $vikingHitPoints < 0 ? 0 : $vikingHitPoints;

             if ($vikingHitPoints < 0 || $swordsmanHitPoints < 0) {
                 break;
             }
         }
     }
}