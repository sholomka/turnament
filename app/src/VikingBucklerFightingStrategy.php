<?php
namespace Tournament;

/**
 * Class VikingBucklerFightingStrategy
 * @package Tournament
 */
class VikingBucklerFightingStrategy
{
    /**
     * Swordsman fight with buckler Vs Viking with buckler
     * @param Fighter $fighter
     * @param $opponent
     */
    public function engage(Fighter $fighter, Fighter $opponent)
    {
        for ($vikingHitPoints = $opponent->totalHitPoints, $swordsmanHitPoints = $fighter->totalHitPoints, $iteration = 0 ; ; $iteration++) {
            $vikingHitPoints -= ($iteration % 2 == 0) ? $fighter->damage : 0;
            $swordsmanHitPoints -= ($iteration % 2 == 0 || $iteration > 3 * 2) ? $opponent->damage : 0;
            $fighter->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $opponent->currentHitPoints = $vikingHitPoints < 0 ? 0 : $vikingHitPoints;

            if ($vikingHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
    }
}