<?php
namespace Tournament;

/**
 * Class HighlanderVeteranFightingStrategy
 * @package Tournament
 */
class HighlanderVeteranFightingStrategy
{
    /**
     * Vicious Swordsman fight Vs Veteran Highlander
     * @param Fighter $fighter
     * @param $opponent
     */
    public function engage(Fighter $fighter, Fighter $opponent) {
        for ($highlanderVeteranHitPoints = $opponent->totalHitPoints, $swordsmanHitPoints = $fighter->totalHitPoints, $iteration = 0 ; ; $iteration++) {
            $highlanderVeteranHitPoints -= ($iteration < 2 ? $fighter->damage + 20 : $fighter->damage);
            $swordsmanHitPoints -= ($iteration % 3 == 0) ? ($highlanderVeteranHitPoints < $fighter->berserkPercent ? $opponent->damage * 2 : $opponent->damage) : 0;
            $fighter->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $opponent->currentHitPoints = $highlanderVeteranHitPoints < 0 ? 0 : $highlanderVeteranHitPoints;

            if ($highlanderVeteranHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
    }
}