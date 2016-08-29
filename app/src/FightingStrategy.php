<?php
namespace Tournament;

/**
 * Class Fightingstrategy
 * @package Tournament
 */
abstract class FightingStrategy
{
    /**
     * Engage
     *
     * @param Fighter $fighter
     * @param $opponent
     * @return mixed
     */
    abstract function engage(Fighter $fighter, $opponent);
}