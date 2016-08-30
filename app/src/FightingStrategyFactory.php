<?php
namespace Tournament;

/**
 * Class FightingStrategyFactory
 * @package Tournament
 */
class FightingStrategyFactory 
{

    /**
     * FightingStrategy object
     * @var
     */
    private static $object;

    /**
     * Create objects
     *
     * @param $fighter
     * @param $opponent
     * @return HighlanderFightingStrategy|HighlanderVeteranFightingStrategy|VikingBucklerFightingStrategy|VikingFightingStrategy
     */
    public static function factory(Fighter $fighter, Fighter $opponent)
    {
        if ($opponent instanceof Viking) {
            if (in_array('buckler', $fighter->equipType) && in_array('buckler', $opponent->equipType)) {
                self::$object = new VikingBucklerFightingStrategy();
            } else {
                self::$object = new VikingFightingStrategy();
            }
        }

        if ($opponent instanceof Highlander) {
            if (!empty($fighter->objectType) && !empty($opponent->objectType)) {
                self::$object = new HighlanderVeteranFightingStrategy();
            } else {
                self::$object = new HighlanderFightingStrategy();
            }
        }

        return self::$object;
    }

}
