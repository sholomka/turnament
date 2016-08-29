<?php
namespace Tournament;

/**
 * Class HighlanderFightingStrategy
 * @package Tournament
 */
class HighlanderFightingStrategy
{
    /**
     * Armored Swordsman fight Vs Viking
     * @param Fighter $fighter
     * @param $opponent
     */
    public function engage(Fighter $fighter, $opponent) {
        for ($highlanderHitPoints = $opponent->totalHitPoints, $swordsmanHitPoints = $fighter->totalHitPoints, $iteration = 0 ; ; $iteration++) {
            $highlanderHitPoints -= $fighter->damage - 1;
            $swordsmanHitPoints -= ((($iteration % 3) % 2) != 0) ? $opponent->damage : 0;
            $fighter->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $opponent->currentHitPoints = $highlanderHitPoints < 0 ? 0 : $highlanderHitPoints;

            if ($highlanderHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
    }
}